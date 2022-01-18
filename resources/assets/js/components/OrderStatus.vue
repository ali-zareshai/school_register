<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-title">
          <h5>وضعیت ها</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-wrench"></i>
            </a>
          </div>
        </div>
        <div :class="{ 'ibox-content': true, 'sk-loading': isLoading }">
          <div class="sk-spinner sk-spinner-double-bounce">
            <div class="sk-double-bounce1"></div>
            <div class="sk-double-bounce2"></div>
          </div>
          <div
            class="modal fade"
            id="status-modal"
            tabindex="-1"
            data-backdrop="static"
            data-keyboard="false"
          >
            <div class="modal-dialog" style="width: 80% !important">
              <div class="modal-content animated rollIn">
                <div class="modal-header">
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                  >
                    ×
                  </button>
                  <h3 class="modal-title">وضعیت</h3>
                </div>
                <div class="modal-body" style="font-size: 11px">
                  <form action="#" data-vv-scope="statusmodel">
                    <div class="row">
                      <div class="col-sm-3">
                        <div
                          :class="{
                            'form-group': true,
                            'has-error': errors.has('statusmodel.name'),
                          }"
                        >
                          <label for="grade">نام:</label>
                          <input
                            v-validate="'required'"
                            class="form-control"
                            name="name"
                            autocomplete="off"
                            type="text"
                            v-model="status.name"
                          />
                          <span
                            class="help-block"
                            v-show="errors.has('statusmodel.name')"
                            >{{ errors.first("statusmodel.name") }}</span
                          >
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <div
                          :class="{
                            'form-group': true,
                            'has-error': errors.has('statusmodel.description'),
                          }"
                        >
                          <label for="grade">توضیحات:</label>
                          <input
                            v-validate="'required'"
                            class="form-control"
                            name="description"
                            autocomplete="off"
                            type="text"
                            v-model="status.description"
                          />
                          <span
                            class="help-block"
                            v-show="errors.has('statusmodel.description')"
                            >{{ errors.first("statusmodel.description") }}</span
                          >
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div
                          :class="{
                            'form-group': true,
                            'has-error': errors.has('statusmodel.progress'),
                          }"
                        >
                          <label for="grade">پیشرفت:</label>
                          <input
                            v-validate="'required|numeric'"
                            class="form-control"
                            name="progress"
                            autocomplete="off"
                            type="number"
                            maxlength="2"
                            v-model="status.progress"
                          />
                          <span
                            class="help-block"
                            v-show="errors.has('statusmodel.progress')"
                            >{{ errors.first("statusmodel.progress") }}</span
                          >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-check">
                        <input
                          v-model="status.has_email"
                          type="checkbox"
                          class="form-check-input"
                        />
                        <label class="form-check-label">ارسال ایمیل</label>
                      </div>
                      <div class="form-check">
                        <input
                          v-model="status.has_sms"
                          type="checkbox"
                          class="form-check-input"
                        />
                        <label class="form-check-label">ارسال پیامک</label>
                      </div>
                      <div class="form-check">
                        <input
                          v-model="status.has_notifaction"
                          type="checkbox"
                          class="form-check-input"
                        />
                        <label class="form-check-label">ارسال هشدار</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <button
                          @click="addStatus"
                          type="button"
                          class="btn btn-primary"
                        >
                          {{ editMode ? "آپدیت" : "ذخیره" }}
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <button
              @click="editMode = false"
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#status-modal"
            >
              <li class="fa fa-plus"></li>
              وضعیت جدید
            </button>
          </div>
          <br />
          <div class="row">
            <div class="k-rtl">
              <kendo-datasource
                ref="dataSourceStatus"
                :data="statusList"
                :filterable="true"
                :sortable-mode="'multiple'"
                :schema-model-id="'id'"
                :page-size="20"
              ></kendo-datasource>

              <kendo-grid
                id="grid"
                :height="450"
                :page="page"
                ref="gridStatusComponent"
                :auto-bind="true"
                @databinding="onDataBinding"
                :data-source-ref="'dataSourceStatus'"
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
                  :field="'name'"
                  :title="'نام'"
                  :width="25"
                ></kendo-grid-column>
                <kendo-grid-column
                  :filterable="true"
                  :field="'description'"
                  :title="'توضیحات'"
                  :width="35"
                ></kendo-grid-column>
                <kendo-grid-column
                  :filterable="true"
                  :field="'progress'"
                  :title="'درصد پیشرفت'"
                  :width="15"
                ></kendo-grid-column>

                <kendo-grid-column
                  :filterable="true"
                  :field="'has_email'"
                  :title="'ایمیل'"
                  :template="getEmailStatus"
                  :width="10"
                ></kendo-grid-column>

                <kendo-grid-column
                  :filterable="true"
                  :field="'has_sms'"
                  :title="'پیامک'"
                  :template="getSmsStatus"
                  :width="10"
                ></kendo-grid-column>

                <kendo-grid-column
                  :filterable="true"
                  :field="'has_notifaction'"
                  :template="getNotifactionStatus"
                  :title="'هشدار'"
                  :width="10"
                ></kendo-grid-column>

                <kendo-grid-column
                  title="عملیات"
                  :filterable="false"
                  :width="20"
                  :command="[
                    { text: 'edit', click: editstatus, template: editButton },
                  ]"
                ></kendo-grid-column>
              </kendo-grid>
            </div>
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
      statusList: {},
      status: {},
      isLoading: false,
      editMode: false,
      editButton:
        "<a role='button' class='k-button k-button-icontext k-grid-edit' data-toggle='tooltip' data-placement='bottom' title='ویرایش کاربر'><span class='fa fa-pencil' style='color:teal'></span></a>",
      grid: {
        pageable: {
          pageSizes: [30, 50, 70, 90, 1000],
          refresh: false,
        },
      },
      gpage: 1,
      record: 0,
    };
  },
  methods: {
    getEmailStatus(e){
      if(e.has_email==1)
        return `<a style="color: green;">✓</a>`
      return `<a style="color: red;">✘</a>` 
    },
    getSmsStatus(e){
      if(e.has_sms==1)
        return `<a style="color: green;">✓</a>`
      return `<a style="color: red;">✘</a>` 
    },
    getNotifactionStatus(e){
      if(e.has_notifaction==1)
        return `<a style="color: green;">✓</a>`
      return `<a style="color: red;">✘</a>` 
    },
    onDataBinding: function (ev) {
      this.record = (this.gpage - 1) * this.$refs.dataSourceStatus.pageSize;
    },
    page: function (e) {
      this.gpage = e.page;
    },
    getTemplate() {
      return ++this.record;
    },
    addStatus() {
      this.$validator.validateAll("statusmodel").then((result) => {
        if (result) {
          this.isLoading = true;
          axios
            .post("/status", this.status)
            .then((res) => {
              this.isLoading = false;
              $("#status-modal").modal("hide");
              swal(
                "انجام شد",
                "وضعیت جدید با موفقیت ایجاد شد ",
                "success"
              ).then((result) => {
                this.getStatus();
              });
            })
            .catch((err) => {
              this.isLoading = false;
              swal("خطا", "خطایی رخ داده است. ", "error");
            });
        }
      });
    },

    getStatus() {
      this.isLoading = true;
      axios
        .get(`/status`)
        .then((res) => {
          this.isLoading = false;
          this.statusList = res.data;
        })
        .catch((err) => {
          this.isLoading = false;
          swal("خطا", "خطایی رخ داده است. ", "error");
        });
    },
    getUserSelectedRow(e) {
      let grid = this.$refs.gridStatusComponent.kendoWidget();
      let row = grid.dataItem($(e.currentTarget).closest("tr"));
      return collect(this.statusList).where("id", row.id).first();
    },
    editstatus(e) {
      this.editMode = true;
      this.status= this.getUserSelectedRow(e);

      $("#status-modal").modal("show");
    },
  },
  mounted() {
    this.getStatus();
  },
};
</script>