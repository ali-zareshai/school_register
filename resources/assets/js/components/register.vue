<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>ثبت نام جدید</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            href="#"
                        >
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
                <div :class="{ 'ibox-content': true, 'sk-loading': isLoading }">
                    <div class="sk-spinner sk-spinner-double-bounce">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>
                    <div class="row">
                        <button
                            @click="showPatmentDialog"
                            type="button"
                            class="btn btn-primary"
                        >
                            <li class="fa fa-plus"></li>
                            ثبت نام جدید
                        </button>
                    </div>
                    <br/>
                    <div class="k-rtl">
                        <kendo-datasource
                            ref="dataSourcePayments"
                            :filterable="true"
                            :sortable-mode="'multiple'"
                            :schema-model-id="'id'"
                            :page-size="15"
                            :transport-read="getPayments"
                            :batch="true"
                            :schema-total="'total'"
                            :schema-data="'data'"
                            :server-paging="true"
                            :type="'odata'"
                        ></kendo-datasource>

                        <kendo-grid
                            id="grid"
                            :height="450"
                            :page="page"
                            ref="gridPaymentComponent"
                            :auto-bind="true"
                            @databinding="onDataBinding"
                            :data-source-ref="'dataSourcePayments'"
                            :navigatable="true"
                            :resizable="true"
                            :sortable="true"
                            :filterable="true"
                            :pageable="grid.pageable"
                            :selectable="false"
                        >
                            <kendo-grid-column
                                title="#"
                                :width="10"
                                :template="getTemplate"
                            ></kendo-grid-column>
                            <kendo-grid-column
                                :filterable="true"
                                :field="'ref_id'"
                                :title="'شماره مرجع'"
                                :width="35"
                            ></kendo-grid-column>
                            <kendo-grid-column
                                :filterable="true"
                                :field="'tracking_code'"
                                :title="'کد پیگیری'"
                                :width="25"
                            ></kendo-grid-column>
                            <kendo-grid-column
                                :filterable="true"
                                :field="'payment_at'"
                                :template="getPaymentDate"
                                :title="'تاریخ پرداخت'"
                                :width="25"
                            ></kendo-grid-column>
                            <kendo-grid-column
                                :filterable="true"
                                :template="getStudentName"
                                :title="' دانش آموز'"
                                :width="25"
                            ></kendo-grid-column>
                            <kendo-grid-column
                                :filterable="true"
                                :template="getStudentFatherName"
                                :title="'نام پدر'"
                                :width="20"
                            ></kendo-grid-column>
                            <kendo-grid-column
                                title="عملیات"
                                :filterable="false"
                                :width="20"
                                :command="[
                                    {
                                        text: 'edit',
                                        click: editStudent,
                                        template: editButton,
                                    },
                                    
                                ]"
                            ></kendo-grid-column>
                        </kendo-grid>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const swal = require("sweetalert2");
const collect = require("collect.js");
const moment = require("jalali-moment");

export default {
    data() {
        return {
            isLoading: false,
            paymentList: {},
            editButton:
                "<a role='button' class='k-button k-button-icontext k-grid-edit' data-toggle='tooltip' data-placement='bottom' title='ویرایش '><span class='fa fa-pencil' style='color:teal'></span></a>",
            grid: {
                pageable: {
                    pageSizes: [30, 50, 100],
                    refresh: true,
                },
            },
            gpage: 1,
        };
    },
    methods: {
        getStudentFatherName(e){
            if(e.student){
                return `${e.student.student_father_name}`
            }
            return `--`;
        },
        getStudentName(e){
            if(e.student){
                return `${e.student.name} ${e.student.family_name}`
            }
            return `--`;
        },
        getPaymentDate(e){
            return moment(e.payment_at, "YYYY-MM-DD HH:mm:ss").format("jYYYY-jMM-jDD HH:mm");
        },
        editStudent(e){
            let payment =this.getPaymentSelectedRow(e);
            console.log(payment);
        },
        getPayments: function (e){
            this.isLoading=true;
            axios.get(`/user/payments?per-page=${e.data.pageSize}&page=${e.data.page}`)
                .then(res=>{
                    this.paymentList=res.data.data;
                    this.isLoading=false;
                    e.success(res.data);
                }).catch(err=>{
                    this.isLoading=false;
                });
        },
        showPatmentDialog(e) {
            swal.fire({
                title: "آیا مطمئن هستید؟",
                text: "آیا از ثبت نام جدید مطمئن هستید؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله و انتقال به صفحه پرداخت",
                cancelButtonText: "لغو",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.transferToPaymentPage();
                }
            });
        },
        onDataBinding: function (ev) {
            this.record =
                (this.gpage - 1) * this.$refs.dataSourcePayments.pageSize;
        },
        page: function (e) {
            this.gpage = e.page;
        },
        getPaymentSelectedRow(e) {
            let grid = this.$refs.gridPaymentComponent.kendoWidget();
            let formRow = grid.dataItem($(e.currentTarget).closest("tr"));
            return collect(this.paymentList).where("id", formRow.id).first();
        },

        getTemplate() {
            return ++this.record;
        },
        transferToPaymentPage() {
            axios
                .post("/payment")
                .then((res) => {
                    if (res.status == 200) {
                        let data = res.data;
                        if (data.action != "") {
                            window.location.href = data.action;
                        }
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
    },
};
</script>
