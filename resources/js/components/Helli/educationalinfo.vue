<template>
    <div>
        <form class="mt-8">
            <div class="flex items-center ">
                <span class="text-orange-500 pl-1">◼</span> <h2 class="text-base font-bold  ">اطلاعات ‌تحصیلی</h2>
                <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
            </div>
            <div class="flex flex-wrap mt-5">
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نام مرکز حوزوی</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option> حوزه‌های علمیه برادران</option>
                            <option>حوزه‌های علمیه خواهران</option>
                            <option>حوزه علمیه خراسان</option>
                            <option>حوزه علمیه اصفهان</option>
                            <option>جامعةالمصطفی</option>
                            <option>جامعةالزهرا</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نوع تحصیل حوزوی</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option value="آزاد">آزاد</option>
                            <option value="تحت برنامه">تحت برنامه</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-2/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">پایه</label>
                        <select class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">استان محل تحصیل</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="قم">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">شهر محل تحصیل</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="قم">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">مدرسه</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="امام صادق(ع)">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">شماره پرونده حوزوی</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="12345">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">مدرک تحصیلی غیر حوزوی</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="کارشناسی">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">رشته تحصیلی غیر حوزوی</label>
                        <input type="text" class="border border-colorborder px-3 py-3   bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="ادیان و مذاهب">
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 flex-row">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">مرکز تخصصی حوزوی</label>
                        <input type="text" class="border border-colorborder px-3 py-3 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="موسسه مهدویت">
                    </div>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "educationalinfo",
    props: ['nationalcode'],
    data() {
        return {
            contact: [],
            address: '',
            phone: '',
            mobile: '',
            postal_code: '',
        }
    },
    mounted() {
        axios.get(`/api/contact/${this.nationalcode}/`)
            .then(response => {
                this.contact = response.data;
            })
            .catch(error => {
                console.log(error)
            })
    },
    methods: {
        handleSubmit() {
            let mobile=this.contact[0]['mobile'];
            if (mobile=='' || mobile==null){
                alert ('شماره همراه وارد نشده است.');
            }
            else if (mobile.length<11 || mobile.length>11){
                alert('شماره همراه در فرمت اشتباه وارد شده است.');
                return false;
            }
            else{
                axios.post(`/api/contact/save/${this.nationalcode}/`, {
                    contact: this.contact,
                })
                    .then(function (response) {
                        alert('اطلاعات تماس شما با موفقیت در سامانه ثبت شد.')
                        // console.log(response.data);
                    })
                    .catch(function (error) {
                        // console.log(error);
                    });
            }
        },
    }

}
</script>

<style scoped>

</style>
