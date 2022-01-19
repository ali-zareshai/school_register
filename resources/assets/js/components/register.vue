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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const swal = require("sweetalert2");
const collect = require("collect.js");

export default {
    data() {
        return {
          isLoading:false
        };
    },
    methods: {
        showPatmentDialog(e) {
            swal.fire({
                title: "آیا مطمئن هستید؟",
                text: "آیا از ثبت نام جدید مطمئن هستید؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله و انتقال به صفحه پرداخت",
                cancelButtonText:"لغو"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.transferToPaymentPage();
                }
            });
        },
        transferToPaymentPage(){
          axios.post('/payment')
            .then(res=>{
              if(res.status==200){
                  let data =res.data;
                  if(data.action!=""){
                      window.location.href=data.action;
                  }
              }
            }).catch(err=>{
                console.log(err);
            });
        }
    },
    mounted() {},
};
</script>
