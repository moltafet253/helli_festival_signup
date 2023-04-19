<template>

    <section dir="rtl" class="py-1">
        <div class="w-full  px-4 mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg  border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">

                    <div class="mt-8">
                        <div class="flex items-center">
                            <span class="text-orange-500 pl-1">◼</span>
                            <h2 class="text-base font-bold">آثار ثبت شده شما</h2>
                            <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                        </div>

                        <div class="flex items-center mt-5 gap-16">

                            <div  class="w-full lg:w-3/12 flex-row bg-white  rounded-lg shadow">
                                <!-- click open modal -->
                                <div @click="showModal3 = true" class=" cursor-pointer flex justify-center items-center rounded-t-lg  border-dashed border-4 border-colorborder border-b-0" href="#">
                                    <img class="p-8 py-8 rounded-t-lg" src="" alt="product image" />
                                </div>
                                <div class="bg-slate-200 border border-colorborder rounded-b-lg">
                                    <div class="flex items-center justify-start px-5 py-3 ">
                                        <img class="w-8 ml-2" src="" alt="product image" />
                                        <p>اثر جدید</p>
                                    </div>
                                </div>
                            </div>


                            <!-- modal -->

                            <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75" leave-class="opacity-100" leave-to-class="opacity-0">
                                <div v-if="showModal3" class="fixed z-30 inset-0 overflow-y-auto">
                                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-7xl w-full">

                                            <div dir="rtl" class="text-right rounded-xl border border-colorborder">
                                                <div dir="rtl" class="px-8 flex items-center justify-between py-5 bg-white border  rounded-xl">
                                                    <div class="flex">
                                                        <span class="pl-1"><img src="" alt=""></span> <h2 class="text-base font-bold  ">انتخاب اثر برای شرکت در پانزدهمین جشنواره علامه حلی (ره)</h2>
                                                    </div>
                                                    <div class="flex items-center gap-1 border-2 border-gray-300 p-2 rounded-lg">
                                                        <button @click="cancel3">بازگشت</button><span>🡠</span>
                                                    </div>
                                                </div>

                                                <div class="mt-8 mx-8 w-full lg:w-5/12 px-4 flex py-3 bg-blue-100 rounded-xl border border-colorborder">
                                                    <div class=" flex-row ">
                                                        <div class="relative w-full ">
                                                            <img class="bg-blue-500 rounded-md p-1" src="" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex-row">
                                                        <div class="relative w-full mb-3 mr-3">
                                                            <p>کاربر گرامی؛ لطفا اطلاعات مربوط به اثر خود را تکمیل نمائید</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <form class="mt-8">

                                                    <div class="flex flex-wrap mt-5 px-5">
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">گروه علمی</label>
                                                                <select id="countries" class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option selected>اصول فقه</option>
                                                                    <option value="US">United States</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="DE">Germany</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">نوع پژوهش</label>
                                                                <select id="countries" class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option selected>تحقیق و تالیف</option>
                                                                    <option value="US">United States</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="DE">Germany</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-8">
                                                                <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">تعداد صفحات (برای مقاله ضروری میباشد.)</label>
                                                                <input type="text" class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold" value="231">
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2" htmlfor="grid-password">بخش ویژه</label>
                                                                <select id="countries" class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option selected>الگوی ایرانی اسلامی پیشرفت</option>
                                                                    <option value="US">United States</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="DE">Germany</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="mt-8 px-8">
                                                    <div class="flex items-center ">
                                                        <span class="text-orange-500 pl-1">◼</span> <h2 class="text-base font-bold  ">اطلاعات‌مشارکان</h2>
                                                        <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
                                                    </div>

                                                    <div class="w-full mt-6 mx-3 ">
                                                        <div>
                                                            <div class="flex items-center">
                                                                <span>نوع فعالیت: </span>
                                                                <div class="flex items-center mr-2">
                                                                    <input checked id="default-radio-1" type="radio" value="shared" v-model="activityType" class="w-4 h-4 text-blue-600 bg-gray-100 border-blue-500 checked:bg-blue-600 checked:border-blue-600">
                                                                    <label for="default-radio-1" class="ml-2 text-sm font-medium ">فردی</label>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input  id="default-radio-2" type="radio" value="Common"  v-model="activityType" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2">
                                                                    <label for="default-radio-2" class="ml-2 text-sm font-medium">مشترک</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div v-if="activityType === 'Common'"  class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                                                        <table class="w-full text-sm text-right">
                                                            <thead class="text-base text-black-3d bg-orange-fce ">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    ردیف
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    نام
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    نام خانوادگی
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    کد ملی/شماره گذرنامه
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    شماره پرونده حوزوی
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    درصد همکاری
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    تلفن همراه
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    حذف
                                                                </th>

                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <tr class="bg-br-f0e border-b border-gray-d1d1">
                                                                <th class=" text-center  px-6 py-4 font-medium text-gray-8484 whitespace-nowrap " >
                                                                    1
                                                                </th>
                                                                <th class=" text-center  px-6 py-4 font-medium text-gray-8484 whitespace-nowrap " >
                                                                    علی
                                                                </th>
                                                                <td class="px-6 py-4 text-black-3d font-medium">
                                                                    سعیدی
                                                                </td>
                                                                <td class="px-6 py-4  text-black-3d font-medium">
                                                                    0372094504
                                                                </td>
                                                                <td class="px-6 py-4  text-black-3d font-medium">
                                                                    5668765
                                                                </td>
                                                                <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="Cooperation" type="text" name="column_1" class="w-16 py-2 shadow-sm rounded-md bg-white text-center border border-colorborder" placeholder="75">
                                                                </td>
                                                                <td class="px-6 py-4  text-black-3d font-medium">
                                                                    09121517243
                                                                </td>
                                                                <td class="px-6 py-4  text-black-3d font-medium">

                                                                </td>

                                                            </tr>
                                                            <tr v-for="(row, index) in rows" :key="index" class="bg-br-f0e border-b border-gray-d1d1">
                                                                <th scope="row" class=" text-center font-medium text-gray-8484 whitespace-nowrap " rowspan="1">
                                                                    {{ index + 2 }}
                                                                </th>
                                                                <td class=" border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.name" type="text" name="column_1" class="w-20 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder" placeholder="محمد">
                                                                </td>
                                                                <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.lastname" type="text" name="column_1" class="w-20 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder" placeholder="مرتضوی">
                                                                </td>
                                                                <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.codemeli" type="text" name="column_1" class="w-24 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder" placeholder="0372094504">
                                                                </td>
                                                                <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.filenumber" type="text" name="column_1" class="w-20 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder" placeholder="5668765">
                                                                </td>
                                                                <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.Cooperation" type="text" name="column_1" class="w-16 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder" placeholder="75">

                                                                </td>
                                                                <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.phonenumber" type="text" name="column_1" class="w-24 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder" placeholder="09121517243">
                                                                </td>
                                                                <td class="px-6 py-4 text-right border-l-0">
                                                                    <button @click="deleteRow(index)">
                                                                        <img class="bg-white rounded-md p-1" src="" alt="">
                                                                    </button>

                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                        <div  class="flex justify-center items-center my-5">
                                                            <!--  :disabled="rows.length >= 10" if limit click btn to 10 -->
                                                            <button @click="addRow" class=" bg-br-f0e flex py-2 px-3 rounded-xl border border-colorborder">
                                                                <span><img class="w-7" src="" alt="down"></span>
                                                                <p class=" font-bold px-4 ">افزودن همکار</p>
                                                            </button>
                                                        </div>


                                                    </div>
                                                    <section>
                                                        <div class="my-8">
                                                            <div class="flex items-center ">
                                                                <span class="text-orange-500 pl-1">◼</span> <h2 class="text-base font-bold  ">افزودن‌فایل‌اثر</h2>
                                                                <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
                                                            </div>
                                                        </div>

                                                        <div class="w-full lg:w-3/12 flex-row bg-white rounded-lg shadow">
                                                            <form>
                                                                <label for="file-upload" class="cursor-pointer flex justify-center items-center rounded-t-lg border-dashed border-4 border-colorborder border-b-0">
                                                                    <img class="p-8 py-8 rounded-t-lg" src="" alt="product image" />
                                                                </label>
                                                                <input id="file-upload" name="file" type="file" class="hidden" accept=".pdf,.doc,.docx" v-on:change="checkFile" />
                                                                <div class="bg-slate-200 border border-colorborder rounded-b-lg ">
                                                                    <div class="flex items-center justify-start px-5 py-3">
                                                                        <p>آپلود فایل اثر <br>(با پسوند PDF, Doc, Docx )</p>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                            <div v-if="error" class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                                                <strong class="font-bold">{{ error }}</strong>
                                                            </div>
                                                        </div>

                                                    </section>
                                                    <p :class="[fileSelected ? 'hidden' : 'text-red-500 text-center']">خطا فایلی انتخاب نشده</p>

                                                </div>
                                                <section v-if="activityType === 'Common'" >
                                                    <div class="flex justify-center mb-8 mt-24">


                                                        <button :disabled="!isTotalCooperationValid || !fileSelected"
                                                                @click="showModal = true"
                                                                :class="[fileSelected && isTotalCooperationValid ? 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl' : 'bg-blue-500 opacity-50 cursor-not-allowed hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl']">
                                                            <span>انتخاب برای ارسال به جشنواره</span>
                                                        </button>

                                                        <button @click="cancel3" class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                            انصراف
                                                        </button>
                                                    </div>
                                                </section>

                                                <section v-else class="fardi" >
                                                    <div class="flex justify-center mb-8 mt-24">

                                                        <button :disabled="!fileSelected" @click="showModal = true" :class="[fileSelected ? 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl' : 'bg-blue-500 opacity-50 cursor-not-allowed hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl']">
                                                            انتخاب برای ارسال به جشنواره
                                                        </button>
                                                        <button @click="cancel3" class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                            انصراف
                                                        </button>
                                                    </div>
                                                </section>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </transition>

                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                            <table dir="rtl" class="w-full text-sm text-right">
                                <thead class="text-base text-black-3d bg-orange-fce ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        قالب اثر
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        نام اثر
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        تعداد صفحات
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        نوع فعالیت
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        فایل اثر
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-gray-eee border-b border-gray-d1d1">
                                    <th scope="row" class=" text-center border-l border-gray-d1d1 px-6 py-4 font-medium text-gray-8484 whitespace-nowrap " rowspan="3">
                                        مقاله
                                    </th>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        ادیان و مذاهب در کلام امامین انقلاب
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        25
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        فردی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b bg-gray-eee text-black-3d font-medium border-gray-d1d1">
                                    <td class="px-6 py-4 border-l-0 border-black">
                                        ادیان و مذاهب در کلام امامین انقلاب
                                    </td>
                                    <td class="px-6 py-4 border-l-0 border-black">
                                        14
                                    </td>
                                    <td class="px-6 py-4 border-l-0 border-black">
                                        گروهی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b bg-gray-eee text-black-3d font-medium border-gray-d1d1">
                                    <td class="px-6 py-4 border-l-0">
                                        ادیان و مذاهب در کلام امامین انقلاب
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        15
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        گروهی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium ">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>

                                <!-- row2 -->
                                <tr class="bg-br-f0e border-b border-gray-d1d1">
                                    <th scope="row" class="text-center border-l border-gray-d1d1 px-6 py-4 font-medium text-gray-8484 whitespace-nowrap " rowspan="2">
                                        تحقیق پایانی
                                    </th>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        ماهیت ریاست جمهوری
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        180
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        فردی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b bg-br-f0e text-black-3d font-medium border-gray-d1d1">
                                    <td class="px-6 py-4 border-l-0">
                                        تعامل کلام و فقه سیاسی در ولایت فقیه
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        200
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        گروهی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>

                                <!-- row3 -->
                                <tr class="bg-gray-eee border-b border-gray-d1d1">
                                    <th scope="row" class="text-center border-l border-gray-d1d1 px-6 py-4 font-medium text-gray-8484 whitespace-nowrap " rowspan="3">
                                        پایان‌نامه
                                    </th>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        گفت و گوی انسانی
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        25
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        فردی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b bg-gray-eee text-black-3d font-medium border-gray-d1d1">
                                    <td class="px-6 py-4 border-l-0 border-black">
                                        آیا می توان با تکفیری ها گفتگو داشت؟
                                    </td>
                                    <td class="px-6 py-4 border-l-0 border-black">
                                        14
                                    </td>
                                    <td class="px-6 py-4 border-l-0 border-black">
                                        گروهی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b bg-gray-eee text-black-3d font-medium border-gray-d1d1">
                                    <td class="px-6 py-4 border-l-0">
                                        نقد و بررسی ریاست جمهوری زنان
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        15
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        گروهی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium ">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <!-- row4 -->
                                <tr class="bg-br-f0e border-b border-gray-d1d1">
                                    <th scope="row" class="text-center border-l border-gray-d1d1 px-6 py-4 font-medium text-gray-8484 whitespace-nowrap " rowspan="2">
                                        تحقیق پایانی
                                    </th>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        ماهیت ریاست جمهوری
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        180
                                    </td>
                                    <td class="px-6 py-4 border-l-0 text-black-3d font-medium">
                                        فردی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="border-b bg-br-f0e text-black-3d font-medium border-gray-d1d1">
                                    <td class="px-6 py-4 border-l-0">
                                        تعامل کلام و فقه سیاسی در ولایت فقیه
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        200
                                    </td>
                                    <td class="px-6 py-4 border-l-0">
                                        گروهی
                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1" src="" alt="">
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <button class="bg-green-600 text-white font-bold py-2 px-4 mt-14 rounded-lg mx-auto block"  @click="submitForm">
                            ارسال نهایی آثار به جشنواره
                        </button>




                    </div>

                    <br>
                    <br>
                    <br>


                    <br>
                    <br>
                    <br>
                    <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        نمایش پاپ آپ
                    </button>
                    <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75" leave-class="opacity-100" leave-to-class="opacity-0">
                        <div v-if="showModal" class="fixed z-40 inset-0 overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-6 py-4">
                                        <img class="mx-auto my-8" src="" alt="Image">
                                    </div>
                                    <div class="px-6 py-4 text-center">
                                        <p class="mb-14 font-bold">{{ message }}</p>
                                        <div class="flex justify-center pb-8">
                                            <button @click="confirm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl">
                                                بله
                                            </button>
                                            <button @click="cancel" class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                خیر
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>

                    <br><br><br><br><br>
                    <button @click="showModal2 = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        نمایش پاپ آپ
                    </button>
                    <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75" leave-class="opacity-100" leave-to-class="opacity-0">
                        <div v-if="showModal2" class="fixed z-10 inset-0 overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="px-6 pt-4">
                                        <img class="mx-auto mt-8" src="" alt="Image">
                                    </div>
                                    <div class="px-6 pb-4 text-center ">
                                        <p class="mb-14 font-bold w-1/2 mx-auto">آثار انتخاب شده با موفقیت
                                            به دبیرخانه جشنواره ارسال شد
                                        </p>
                                        <div class="flex justify-center pb-8">

                                            <button @click="cancel2" class="bg-white hover:bg-slate-200 border border-colorborder text-black py-2 px-10 rounded-xl">
                                                بستن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </section>



</template>


<script>
export default {
    data() {
        return {
            rows: [
                { name: '', lastname: '', codemeli: '' , filenumber: '' , Cooperation: '' , phonenumber: '' , },
            ],
            Cooperation:'',
            showModal: false,
            showModal2: false,
            showModal3: false,
            activityType: 'shared',
            fileSelected: false,
            fileName: "",
            error: null,
            message: 'اطلاعات وارد شده را تایید می‌نمایید؟',
        };
    },

    computed: {
        isSubmitButtonDisabled() {
            return !this.fileSelected;
        },
        isTotalCooperationValid() {
            // Check if all required fields are filled
            const allFieldsFilled = this.rows.every(row => {
                return row.name && row.lastname && row.codemeli && row.filenumber && row.Cooperation && row.phonenumber ;
            });
            if (!allFieldsFilled) {
                return false;
            }
            //   alert(this.rows)
            //   alert(this.Cooperation)
            // Check if total cooperation is valid
            const total = this.rows.reduce((acc, row) => acc + (parseInt(row.Cooperation) || 0), 0) + (parseInt(this.Cooperation) || 0);
            if (total === 100) {
                return true;
            } else if (total > 100) {
                alert('مجموع همکاری ها نمی‌تواند بیشتر از ۱۰۰ باشد.');
            } else {
                return false;
            }
        },
    },
    methods: {



        addRow() {
            this.rows.push({ name: '', lastname: '', codemeli: '' , filenumber: '' , Cooperation: '' , phonenumber: '' , }  );
        },
        deleteRow(index) {
            this.rows.splice(index, 1);
        },
        confirm() {
            this.showModal = false;
            this.showModal3 = false;

        },
        cancel() {
            this.showModal = false;
        },
        cancel2() {
            this.showModal2 = false;
        },

        confirm3() {
            this.showModal3 = false;
        },
        cancel3() {
            this.showModal3 = false;
        },

        checkFile(event) {
            if (event.target.files.length === 0) {
                this.fileSelected = false;
                this.fileName = "";
                this.error = "خطا: فایلی انتخاب نشده است!";
            } else {
                const file = event.target.files[0];
                const allowedExtensions = /(\.pdf|\.doc|\.docx)$/i;
                if (!allowedExtensions.test(file.name)) {
                    this.fileSelected = false;
                    this.fileName = "";
                    this.error = 'خطا: پسوند فایل مجاز نیست!';
                } else {
                    // هنگامی که فایل مجاز است
                    this.fileSelected = true;
                    this.error = '';
                }
            }
        }

    }
};
</script>


