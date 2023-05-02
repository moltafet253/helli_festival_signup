<template>
    <div v-if="requestsCount>0" class="loading-modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="spinner"></div>
            <div class="loading-text">
                <p class="typewriter">
                    دریافت اطلاعات تحصیلی...
                </p>
            </div>
        </div>
    </div>
    <div>
        <form class="mt-8" @submit.prevent="handleSubmit(this.nationalcode )">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span>
                <h2 class="text-base font-bold">اطلاعات ‌تحصیلی</h2>
                <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="flex flex-wrap mt-3">
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">نام مرکز
                            حوزوی<span style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.namemarkaztahsili" v-for="(item, index) in edu"
                                @change="returnProvince(item.namemarkaztahsili)"
                                @loadeddata="returnProvince(item.namemarkaztahsili)"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in markaz" :value="item.markaz"
                                    v-bind:selected="item.namemarkaztahsili===item.markaz">{{ item.markaz }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">نوع تحصیل حوزوی
                            <span style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.noetahsilhozavi" v-for="(item, index) in edu"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option value="آزاد" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.noetahsilhozavi==='آزاد'">آزاد
                            </option>
                            <option value="تحت برنامه" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.noetahsilhozavi==='تحت برنامه'">تحت برنامه
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row" v-if="this.gender==='مرد'">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">پایه<span
                            style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.paye" v-for="(item, index) in edu"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option value="1" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='1'">1
                            </option>
                            <option value="2" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='2'">2
                            </option>
                            <option value="3" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='3'">3
                            </option>
                            <option value="4" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='4'">4
                            </option>
                            <option value="5" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='5'">5
                            </option>
                            <option value="6" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='6'">6
                            </option>
                            <option value="7" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='7'">7
                            </option>
                            <option value="8" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='8'">8
                            </option>
                            <option value="9" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='9'">9
                            </option>
                            <option value="10" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='10'">10
                            </option>
                            <option value="11" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='11'">11
                            </option>
                            <option value="12" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.paye==='12'">12
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row" v-if="this.gender==='زن'">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">سطح<span
                            style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.sath" v-for="(item, index) in edu"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option value="2" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.sath==='2'">2
                            </option>
                            <option value="3" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.sath==='3'">3
                            </option>
                            <option value="4" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.sath==='4'">4
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row" v-if="this.gender==='زن'">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">ترم<span
                            style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.term" v-for="(item, index) in edu"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option value="1" v-if="item.sath===2 || item.sath===3 || item.sath===4"
                                    v-for="(item, index) in edu"
                                    :key="index" v-bind:selected="item.term==='1'">1
                            </option>
                            <option value="2" v-if="item.sath===2 || item.sath===3 || item.sath===4"
                                    v-for="(item, index) in edu"
                                    :key="index" v-bind:selected="item.term==='2'">2
                            </option>
                            <option value="3" v-if="item.sath===2 || item.sath===3 || item.sath===4"
                                    v-for="(item, index) in edu"
                                    :key="index" v-bind:selected="item.term==='3'">3
                            </option>
                            <option value="4" v-if="item.sath===2 || item.sath===4" v-for="(item, index) in edu"
                                    :key="index"
                                    v-bind:selected="item.term==='4'">4
                            </option>
                            <option value="5" v-if="item.sath===2 || item.sath===4" v-for="(item, index) in edu"
                                    :key="index"
                                    v-bind:selected="item.term==='5'">5
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">استان محل تحصیل<span
                            style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.ostantahsili" v-for="(item, index) in edu"
                                @change="returnCity(item.ostantahsili,this.gender)"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in ostan" :value="item.ostan"
                                    v-bind:selected="item.ostantahsili===item.ostan">{{ item.ostan }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">شهر محل
                            تحصیل<span style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.shahrtahsili" v-for="(item, index) in edu"
                                @change="returnSchool(item.shahrtahsili)"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in shahr" :value="item.shahr"
                                    v-bind:selected="item.shahrtahsili===item.shahr">{{ item.shahr }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">مدرسه<span
                            style="color: red;">*</span></label>
                        <select :disabled="!showButton" v-model="item.madresetahsili" v-for="(item, index) in edu"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option v-for="item in madrese" :value="item.madrese"
                                    v-bind:selected="item.madresetahsili===item.madrese">{{ item.madrese }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">شماره پرونده
                            حوزوی<span style="color: red;">*</span></label>
                        <input :disabled="!showButton" v-for="(item, index) in edu" :key="index" type="text"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.shparvandetahsili"
                               placeholder="شماره پرونده تحصیلی حوزوی خود را وارد نمایید">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">مدرک تحصیلی غیر
                            حوزوی</label>
                        <select :disabled="!showButton" v-for="(item, index) in edu" :key="index"
                                v-model="item.tahsilatghhozavi"
                                class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option selected disabled style="color: #6c757d">انتخاب کنید</option>
                            <option value="زیر دیپلم" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='زیر دیپلم'">زیر دیپلم
                            </option>
                            <option value="دیپلم" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='دیپلم'">دیپلم
                            </option>
                            <option value="فوق دیپلم/کاردانی" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='فوق دیپلم/کاردانی'">فوق دیپلم/کاردانی
                            </option>
                            <option value="لیسانس/کارشناسی" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='لیسانس/کارشناسی'">لیسانس/کارشناسی
                            </option>
                            <option value="فوق لیسانس/کارشناسی ارشد" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='فوق لیسانس/کارشناسی ارشد'">فوق
                                لیسانس/کارشناسی ارشد
                            </option>
                            <option value="دکتری" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='دکتری'">دکتری
                            </option>
                            <option value="فوق دکتری" v-for="(item, index) in edu" :key="index"
                                    v-bind:selected="item.tahsilatghhozavi==='فوق دکتری'">فوق دکتری
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">رشته تحصیلی غیر
                            حوزوی</label>
                        <input :disabled="!showButton" v-for="(item, index) in edu" :key="index" type="text"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.reshtedaneshgahi" placeholder="رشته تحصیلی غیر حوزوی را وارد نمایید">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2">مرکز تخصصی
                            حوزوی</label>
                        <input :disabled="!showButton" v-for="(item, index) in edu" :key="index" type="text"
                               class="border border-colorborder px-3 py-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold"
                               v-model="item.markaztakhasosihozavi" placeholder="مرکز تخصصی حوزوی خود را وارد نمایید">
                    </div>
                </div>
                <div class="w-full mt-4">
                    <button v-show="showButton"
                            class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg mx-auto block">ذخیره اطلاعات
                        تحصیلی
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "educationalinfo",
    props: ['token'],

    data() {
        return {
            nationalcode:'',
            requestsCount: 0,
            edu: [],
            gender: '',
            paye: '',
            sath: '',
            term: '',
            namemarkaztahsili: '',
            ostantahsili: [],
            shahrtahsili: [],
            madresetahsili: [],
            noetahsilhozavi: '',


            markaz: [],
            ostan: [],
            shahr: [],
            madrese: [],

            centerSend: '',
            provinceSend: '',
            showButton: true,

        }
    },
    async mounted() {
       await this.getDataFromEduTable(this.token);

        await this.getDataFromProvincesTable(this.gender);
    },
    methods: {
        async getDataFromEduTable(token) {
            await axios.get('/edu/' + token,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.edu = response.data.edu;
                    this.gender = response.data.gender;
                    if (response.data.edu[0]['approved'] === 1) {
                        this.showButton = false;
                        this.returnProvince(this.edu[0]['namemarkaztahsili']);
                        this.returnCity(this.edu[0]['ostantahsili']);
                        this.returnSchool(this.edu[0]['shahrtahsili']);
                    }
                })
                .catch(error => {
                    console.log(error)
                });
        },
        async getDataFromProvincesTable(gender) {
            await axios.get('/defaults/centers/' + gender,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.markaz = response.data;
                })
                .catch(error => {
                    console.log(error)
                });
        },

        async returnProvince(center) {
            this.ostan = [];
            this.shahr = [];
            this.madrese = [];
            this.centerSend = center;
            await axios.get(`/defaults/provinces/${center}/${this.gender}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.ostan = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async returnCity(province) {
            this.shahr = [];
            this.madrese = [];
            this.provinceSend = province;
            await axios.get(`/defaults/cities/${this.centerSend}/${province}/${this.gender}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.shahr = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async returnSchool(city) {
            await axios.get(`/defaults/schools/${this.centerSend}/${this.provinceSend}/${city}/${this.gender}`,{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.madrese = response.data;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        handleSubmit(a) {
            let namemarkaztahsili = this.edu[0]['namemarkaztahsili'];
            let noetahsilhozavi = this.edu[0]['noetahsilhozavi'];
            let ostantahsili = this.edu[0]['ostantahsili'];
            let shahrtahsili = this.edu[0]['shahrtahsili'];
            let madresetahsili = this.edu[0]['madresetahsili'];
            let shparvandetahsili = this.edu[0]['shparvandetahsili'];
            let paye = this.edu[0]['paye'];
            let sath = this.edu[0]['sath'];
            let term = this.edu[0]['term'];
            let gender = this.gender;
            let tahsilatghhozavi = this.edu[0]['tahsilatghhozavi'];
            let reshtedaneshgahi = this.edu[0]['reshtedaneshgahi'];

            if (namemarkaztahsili === '' || namemarkaztahsili === null || namemarkaztahsili === 'انتخاب کنید') {
                alert('نام مرکز حوزوی انتخاب نشده است.');
            } else if (noetahsilhozavi === '' || noetahsilhozavi === null || noetahsilhozavi === 'انتخاب کنید') {
                alert('نوع تحصیل حوزوی انتخاب نشده است.');
            } else if (ostantahsili === '' || ostantahsili === null) {
                alert('استان محل تحصیل انتخاب نشده است.');
            } else if (shahrtahsili === '' || shahrtahsili === null) {
                alert('شهر محل تحصیل انتخاب نشده است.');
            } else if (madresetahsili === '' || madresetahsili === null) {
                alert('مدرسه انتخاب نشده است.');
            } else if (shparvandetahsili === '' || shparvandetahsili === null) {
                alert('شماره پرونده حوزوی وارد نشده است.');
            } else if (gender === 'زن' && (sath === '' || sath === null || sath === 'انتخاب کنید')) {
                paye = null;
                alert('سطح انتخاب نشده است.');
            } else if (gender === 'زن' && (term === '' || term === null || term === 'انتخاب کنید')) {
                paye = null;
                alert('ترم انتخاب نشده است.');
            } else if (gender === 'مرد' && (paye === '' || paye === null || paye === 'انتخاب کنید')) {
                sath = null;
                term = null;
                alert('پایه انتخاب نشده است.');
            } else if ((reshtedaneshgahi !== null || reshtedaneshgahi !== '') && (tahsilatghhozavi === '' || tahsilatghhozavi === null || tahsilatghhozavi === 'انتخاب کنید')) {
                alert('مدرک تحصیلی غیر حوزوی انتخاب نشده است.');
            } else if ((reshtedaneshgahi === null || reshtedaneshgahi === '') && (tahsilatghhozavi !== '' || tahsilatghhozavi !== null || tahsilatghhozavi !== 'انتخاب کنید') && tahsilatghhozavi !== 'زیر دیپلم') {
                alert('رشته تحصیلی غیر حوزوی وارد نشده است.');
            } else {
                if (confirm('آیا از صحت اطلاعات وارد شده مطمئن هستید؟ ' +
                    '\n' +
                    'اطلاعات شما در صورت تایید دیگر قابل تغییر نیست.')) {
                    axios.post(`/edu/save/`, {
                        edu: this.edu,
                        gender: gender,
                    },{
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(function (response) {

                        })
                        .catch(function (error) {
                            // console.log(error);
                        }).finally(function () {
                        alert('اطلاعات تحصیلی شما با موفقیت در سامانه ثبت شد.');
                        location.reload();
                    });
                }
            }
        },
    }

}
</script>

<style scoped>

</style>
