<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>ثبت نام</h5>
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
                    <form-wizard
                        ref="fm"
                        @on-change="handleTabChanged"
                        @on-complete="onComplete"
                        color="#1c84c6"
                        title=""
                        subtitle=""
                        shape="circle"
                        back-button-text="بازگشت"
                        next-button-text="تایید و ادامه"
                        :finish-button-text="'ذخیره نهایی'"
                        error-color="#ff4949"
                    >
                        <tab-content
                            title="اطلاعات دانش آموز"
                            icon="ti-world"
                            :before-change="beforeTabSwitch"
                        >
                            <form data-vv-scope="s1">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has('s1.kelas'),
                                                }"
                                            >
                                                <label>مقطع *</label>
                                                <select
                                                    name="kelas"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="student.kelas"
                                                >
                                                    <option value="پیش دبستانی">
                                                        پیش دبستانی
                                                    </option>
                                                    <option value="اول">
                                                        اول
                                                    </option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has('s1.kelas')
                                                    "
                                                    >{{
                                                        errors.first("s1.kelas")
                                                    }}</span
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has('s1.gender'),
                                                }"
                                            >
                                                <label>جنس *</label>
                                                <select
                                                    name="gender"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="student.gender"
                                                >
                                                    <option value="پسر">
                                                        پسر
                                                    </option>
                                                    <option value="دختر">
                                                        دختر
                                                    </option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has('s1.gender')
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.gender"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has('s1.name'),
                                                }"
                                            >
                                                <label>نام *</label>
                                                <input
                                                    name="name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.name"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has('s1.name')
                                                    "
                                                    >{{
                                                        errors.first("s1.name")
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's1.family_name'
                                                        ),
                                                }"
                                            >
                                                <label>نام خانوادگی *</label>
                                                <input
                                                    name="family_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.family_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.family_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.family_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's1.student_father_name'
                                                    ),
                                                }"
                                            >
                                                <label>نام پدر *</label>
                                                <input
                                                    name="student_father_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.student_father_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.student_father_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.student_father_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's1.meli_code'
                                                        ),
                                                }"
                                            >
                                                <label> شماره ملی *</label>
                                                <input
                                                    type="number"
                                                    name="meli_code"
                                                    v-validate="
                                                        'required|irani'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.meli_code"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.meli_code'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.meli_code"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's1.serial_ssn'
                                                        ),
                                                }"
                                            >
                                                <label> سریال شناسنامه *</label>
                                                <input
                                                    type="number"
                                                    name="serial_ssn"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.serial_ssn"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.serial_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.serial_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's1.city_ssn'
                                                        ),
                                                }"
                                            >
                                                <label> محل صدور *</label>
                                                <input
                                                    name="city_ssn"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.city_ssn"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.city_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.city_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's1.birth_date'
                                                        ),
                                                }"
                                            >
                                                <label for="birth_date"
                                                    >تاریخ تولد *</label
                                                >
                                                <date-picker
                                                    :auto-submit="true"
                                                    format="YYYY-MM-DD HH:mm:ss"
                                                    display-format="jYYYY/jMM/jDD"
                                                    name="birth_date"
                                                    autocomplete="off"
                                                    v-model="student.birth_date"
                                                    view="year"
                                                    clearable
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.birth_date'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.birth_date"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's1.several_children'
                                                    ),
                                                }"
                                            >
                                                <label> چندمین فرزند *</label>
                                                <input
                                                    type="number"
                                                    max="20"
                                                    name="several_children"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.several_children
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's1.several_children'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s1.several_children"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label>
                                                آیا نوآموز در مهد کودک، مهد قرآن
                                                یا پیش دبستانی آموزش دیده؟
                                                چنانچه جواب مثبت است نام مهد
                                                کودک، مهد قرآن یا پیش دبستانی را
                                                بنویسید:</label
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <input
                                                type="text"
                                                name="old_school"
                                                class="form-control"
                                                autocomplete="off"
                                                v-model="student.old_school"
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label>
                                                آیا فرزند دیگری از شما در این
                                                مجتمع به تحصیل اشتغال
                                                دارد؟</label
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <select
                                                name="other_childern"
                                                v-validate="'required'"
                                                class="form-control"
                                                v-model="student.other_childern"
                                            >
                                                <option value="خیر">خیر</option>
                                                <option value="بله">بله</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </tab-content>
                        <tab-content
                            title="اطلاعات پدر دانش آموز"
                            icon="ti-world"
                            :before-change="beforeTabSwitch"
                        >
                            <form data-vv-scope="s2">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_type'
                                                        ),
                                                }"
                                            >
                                                <label>پدر یا ولی *</label>
                                                <select
                                                    name="father_type"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="
                                                        student.father_type
                                                    "
                                                >
                                                    <option value="پدر">
                                                        پدر
                                                    </option>
                                                    <option value="ولی">
                                                        ولی
                                                    </option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_type'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_type"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_name'
                                                        ),
                                                }"
                                            >
                                                <label>نام *</label>
                                                <input
                                                    name="father_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_family_name'
                                                    ),
                                                }"
                                            >
                                                <label>نام خانوادگی *</label>
                                                <input
                                                    name="father_family_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_family_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_family_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_family_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_father_name'
                                                    ),
                                                }"
                                            >
                                                <label>نام پدر *</label>
                                                <input
                                                    name="father_father_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_father_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_father_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_father_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_meli_code'
                                                    ),
                                                }"
                                            >
                                                <label> شماره ملی *</label>
                                                <input
                                                    type="number"
                                                    name="father_meli_code"
                                                    v-validate="
                                                        'required|irani'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_meli_code
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_meli_code'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_meli_code"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_ssn'
                                                        ),
                                                }"
                                            >
                                                <label> شماره شناسنامه *</label>
                                                <input
                                                    type="number"
                                                    name="father_ssn"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.father_ssn"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_serial_ssn'
                                                    ),
                                                }"
                                            >
                                                <label> سریال شناسنامه *</label>
                                                <input
                                                    type="number"
                                                    name="father_serial_ssn"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_serial_ssn
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_serial_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_serial_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_city_ssn'
                                                        ),
                                                }"
                                            >
                                                <label> محل صدور *</label>
                                                <input
                                                    name="father_city_ssn"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_city_ssn
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_city_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_city_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_birth_date'
                                                    ),
                                                }"
                                            >
                                                <label for="father_birth_date"
                                                    >تاریخ تولد *</label
                                                >
                                                <date-picker
                                                    :auto-submit="true"
                                                    format="YYYY-MM-DD HH:mm:ss"
                                                    display-format="jYYYY/jMM/jDD"
                                                    name="father_birth_date"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_birth_date
                                                    "
                                                    view="year"
                                                    clearable
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_birth_date'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_birth_date"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_education'
                                                    ),
                                                }"
                                            >
                                                <label>تحصیلات *</label>
                                                <select
                                                    name="father_education"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="
                                                        student.father_education
                                                    "
                                                >
                                                    <option>دکتری</option>
                                                    <option>
                                                        کارشناسی ارشد
                                                    </option>
                                                    <option>کارشناسی</option>
                                                    <option>کاردانی</option>
                                                    <option>دیپلم</option>
                                                    <option>زیردیپلم</option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_education'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_education"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_job_type'
                                                        ),
                                                }"
                                            >
                                                <label>نوع شغل *</label>
                                                <select
                                                    name="father_job_type"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="
                                                        student.father_job_type
                                                    "
                                                >
                                                    <option value="1">
                                                        کارمند
                                                    </option>
                                                    <option value="2">
                                                        آزاد
                                                    </option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_job_type'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_job_type"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3"
                                            v-if="student.father_job_type"
                                        >
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_job'
                                                        ),
                                                }"
                                            >
                                                <label
                                                    v-if="
                                                        student.father_job_type ==
                                                        1
                                                    "
                                                    >نام ارگان</label
                                                >
                                                <label
                                                    v-if="
                                                        student.father_job_type ==
                                                        2
                                                    "
                                                    >نوع شغل</label
                                                >
                                                <input
                                                    name="father_job"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.father_job"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_job'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_job"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_job_address'
                                                    ),
                                                }"
                                            >
                                                <label>آدرس محل کار</label>
                                                <input
                                                    name="father_job_address"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_job_address
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_job_address'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_job_address"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's2.father_job_telephone'
                                                    ),
                                                }"
                                            >
                                                <label>تلفن محل کار</label>
                                                <input
                                                    type="number"
                                                    name="father_job_telephone"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_job_telephone
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_job_telephone'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_job_telephone"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's2.father_mobile'
                                                        ),
                                                }"
                                            >
                                                <label> تلفن همراه</label>
                                                <input
                                                    type="number"
                                                    name="father_mobile"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.father_mobile
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's2.father_mobile'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s2.father_mobile"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </tab-content>
                        <tab-content
                            title="اطلاعات مادر دانش آموز"
                            icon="ti-world"
                            :before-change="beforeTabSwitch"
                        >
                            <form data-vv-scope="s3">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's3.mother_name'
                                                        ),
                                                }"
                                            >
                                                <label>نام *</label>
                                                <input
                                                    name="mother_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_family_name'
                                                    ),
                                                }"
                                            >
                                                <label>نام خانوادگی *</label>
                                                <input
                                                    name="mother_family_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_family_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_family_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_family_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_father_name'
                                                    ),
                                                }"
                                            >
                                                <label>نام پدر *</label>
                                                <input
                                                    name="mother_father_name"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_father_name
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_father_name'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_father_name"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_meli_code'
                                                    ),
                                                }"
                                            >
                                                <label> شماره ملی *</label>
                                                <input
                                                    type="number"
                                                    name="mother_meli_code"
                                                    v-validate="
                                                        'required|irani'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_meli_code
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_meli_code'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_meli_code"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's3.mother_ssn'
                                                        ),
                                                }"
                                            >
                                                <label> شماره شناسنامه *</label>
                                                <input
                                                    type="number"
                                                    name="mother_ssn"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.mother_ssn"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_serial_ssn'
                                                    ),
                                                }"
                                            >
                                                <label> سریال شناسنامه *</label>
                                                <input
                                                    type="number"
                                                    name="mother_serial_ssn"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_serial_ssn
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_serial_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_serial_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's3.mother_city_ssn'
                                                        ),
                                                }"
                                            >
                                                <label> محل صدور *</label>
                                                <input
                                                    name="mother_city_ssn"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_city_ssn
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_city_ssn'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_city_ssn"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_birth_date'
                                                    ),
                                                }"
                                            >
                                                <label for="mother_birth_date"
                                                    >تاریخ تولد *</label
                                                >
                                                <date-picker
                                                    :auto-submit="true"
                                                    format="YYYY-MM-DD HH:mm:ss"
                                                    display-format="jYYYY/jMM/jDD"
                                                    name="mother_birth_date"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_birth_date
                                                    "
                                                    view="year"
                                                    clearable
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_birth_date'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_birth_date"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_education'
                                                    ),
                                                }"
                                            >
                                                <label>تحصیلات *</label>
                                                <select
                                                    name="mother_education"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="
                                                        student.mother_education
                                                    "
                                                >
                                                    <option>دکتری</option>
                                                    <option>
                                                        کارشناسی ارشد
                                                    </option>
                                                    <option>کارشناسی</option>
                                                    <option>کاردانی</option>
                                                    <option>دیپلم</option>
                                                    <option>زیردیپلم</option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_education'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_education"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's3.mother_job_type'
                                                        ),
                                                }"
                                            >
                                                <label>نوع شغل *</label>
                                                <select
                                                    name="mother_job_type"
                                                    v-validate="'required'"
                                                    class="form-control"
                                                    v-model="
                                                        student.mother_job_type
                                                    "
                                                >
                                                    <option value="1">
                                                        خانه دار
                                                    </option>
                                                    <option value="2">
                                                        کارمند
                                                    </option>
                                                </select>
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_job_type'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_job_type"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3"
                                            v-if="student.mother_job_type == 2"
                                        >
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's3.mother_job'
                                                        ),
                                                }"
                                            >
                                                <label>نام ارگان</label>
                                                <input
                                                    name="mother_job"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.mother_job"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_job'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_job"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="row"
                                        v-if="student.mother_job_type == 2"
                                    >
                                        <div class="col-md-6">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_job_address'
                                                    ),
                                                }"
                                            >
                                                <label>آدرس محل کار</label>
                                                <input
                                                    name="mother_job_address"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_job_address
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_job_address'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_job_address"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's3.mother_job_telephone'
                                                    ),
                                                }"
                                            >
                                                <label>تلفن محل کار</label>
                                                <input
                                                    type="number"
                                                    name="mother_job_telephone"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.mother_job_telephone
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's3.mother_job_telephone'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s3.mother_job_telephone"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </tab-content>
                        <tab-content
                            title="اطلاعات تماس"
                            icon="ti-world"
                            :before-change="beforeTabSwitch"
                        >
                            <form data-vv-scope="s4">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's4.home_phone'
                                                        ),
                                                }"
                                            >
                                                <label>تلفن ثابت *</label>
                                                <input
                                                    type="number"
                                                    name="home_phone"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.home_phone"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's4.home_phone'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s4.home_phone"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has('s4.mobile'),
                                                }"
                                            >
                                                <label>تلفن همراه *</label>
                                                <input
                                                    type="number"
                                                    name="mobile"
                                                    v-validate="
                                                        'required|numeric'
                                                    "
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="student.mobile"
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has('s4.mobile')
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s4.mobile"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error': errors.has(
                                                        's4.connection_phone'
                                                    ),
                                                }"
                                            >
                                                <label>شماره رابط *</label>
                                                <input
                                                    type="number"
                                                    name="connection_phone"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.connection_phone
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's4.connection_phone'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s4.connection_phone"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's4.home_post_code'
                                                        ),
                                                }"
                                            >
                                                <label> کد پستی *</label>
                                                <input
                                                    type="number"
                                                    name="home_post_code"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.home_post_code
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's4.home_post_code'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s4.home_post_code"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                :class="{
                                                    'form-group': true,
                                                    'has-error':
                                                        errors.has(
                                                            's4.home_address'
                                                        ),
                                                }"
                                            >
                                                <label>آدرس *</label>
                                                <input
                                                    type="text"
                                                    name="home_address"
                                                    v-validate="'required'"
                                                    class="form-control required"
                                                    autocomplete="off"
                                                    v-model="
                                                        student.home_address
                                                    "
                                                />
                                                <span
                                                    class="help-block"
                                                    v-show="
                                                        errors.has(
                                                            's4.home_address'
                                                        )
                                                    "
                                                    >{{
                                                        errors.first(
                                                            "s4.home_address"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </tab-content>
                    </form-wizard>
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
            activeIndex: 0,
            student: {},
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
        handleTabChanged(prevIndex, nextIndex) {
            this.activeIndex = nextIndex;
        },
        onComplete: function () {
            swal.fire({
                title: "آیا مطمئن هستید؟",
                text: "آیا از صحت اطلاعات مطمئن هستید؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله و ارسال",
                cancelButtonText: "لغو",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.sendForm();
                }
            });
        },
        sendForm(){
            this.isLoading=true;
            this.student.payment=this.$route.query.ref_id;
            axios.post(`/student`,this.student)
                .then(res=>{
                    this.isLoading=false;
                    swal("انجام شد", "اطلاعات با موفقیت ارسال شد ", "success").then(
                        result => {
                            this.$router.push({ path: `/` });
                        }
                        );
                }).catch(err=>{
                    this.isLoading=false;
                    swal("خطا", "خطایی رخ داده است. ", "error");
                    console.log(err);
                })
        },
        beforeTabSwitch: function () {
            this.errors.clear();
            console.log("s" + (this.activeIndex + 1));
            return new Promise((resolve, reject) => {
                this.$validator
                    .validateAll("s" + (this.activeIndex + 1))
                    .then((result) => {
                        if (result) {
                            if (this.activeIndex+1 == 4) {
                                this.sendForm();
                            }
                            resolve(true);
                        }

                        reject("Error");
                    });
            });
        },
    },
    mounted() {},
};
</script>
<style>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.wizard > .steps > ul > li,
.wizard > .actions > ul > li {
    float: right;
}
.vue-form-wizard .wizard-progress-bar {
    float: right !important;
}

.swal2-container {
    z-index: 10000 !important;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
