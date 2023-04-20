<template>


    <section dir="rtl" class="py-1">
        <div class="w-full mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg  border-0">
                <div class="flex-auto  py-10 pt-0">

                    <div class="mt-8">
                        <div class="flex items-center">
                            <span class="text-orange-500 pl-1">◼</span>
                            <h2 class="text-base font-bold">آثار ثبت شده شما</h2>
                            <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                        </div>

                        <div class="flex items-center mt-5 gap-16">

                            <div class="w-full lg:w-3/12 flex-row bg-white  rounded-lg shadow">
                                <!-- click open modal -->
                                <div @click="showModal3 = true"
                                     class=" cursor-pointer flex justify-center items-center rounded-t-lg  border-dashed border-4 border-colorborder border-b-0"
                                     href="#">
                                    <img class="p-8 py-8 rounded-t-lg" src="build/assets/icons/Paper Upload.png"
                                         alt="product image"/>
                                </div>
                                <div class="bg-slate-200 border border-colorborder rounded-b-lg">
                                    <div class="flex items-center justify-start px-5 py-3 ">
                                        <img class="w-8 ml-2" src="build/assets/icons/miniCircle 37181.png"
                                             alt="product image"/>
                                        <p class="m-0">اثر جدید</p>
                                    </div>
                                </div>
                            </div>


                            <!-- modal -->

                            <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0"
                                        enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                        leave-class="opacity-100" leave-to-class="opacity-0">
                                <div v-if="showModal3" class="fixed z-30 inset-0 overflow-y-auto">
                                    <div
                                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                              aria-hidden="true">&#8203;</span>
                                        <div
                                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-7xl w-full">

                                            <div dir="rtl" class="text-right rounded-xl border border-colorborder">
                                                <div dir="rtl"
                                                     class="px-8 flex items-center justify-between py-3 bg-white border  rounded-xl">
                                                    <div class="flex">
                                                        <span class="pl-1"><img src="build/assets/icons/Edit Square.png"
                                                                                alt=""></span>
                                                        <h2 class="text-base font-bold ">اطلاعات اثر برای شرکت در
                                                            پانزدهمین جشنواره علامه حلی (ره)</h2>
                                                    </div>
                                                    <div
                                                        class="flex items-center gap-1 border-2 border-gray-300 p-2 rounded-lg">
                                                        <button @click="cancel3">بازگشت</button>
                                                        <span>🡠</span>
                                                    </div>
                                                </div>

                                                <div
                                                    class="mt-8 mx-8 w-full lg:w-5/12 px-4 flex py-3 bg-blue-100 rounded-xl border border-colorborder">
                                                    <div class=" flex-row ">
                                                        <div class="relative w-full ">
                                                            <img class="bg-blue-500 rounded-md p-1"
                                                                 src="build/assets/icons/Info Square.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex-row">
                                                        <div class="relative w-full mr-3">
                                                            <p class="mb-0">کاربر گرامی؛ لطفا اطلاعات مربوط به اثر خود
                                                                را تکمیل
                                                                نمائید</p>
                                                        </div>
                                                    </div>
                                                </div>


<!--                                                <form class="mt-8" >-->

                                                    <div class="flex flex-wrap mt-5 px-5">
                                                        <div class="w-full lg:w-8/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >نام اثر<span
                                                                    style="color: red;">*</span></label>
                                                                <input type="text" id="name" name="name" v-model="name"
                                                                       class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >قالب پژوهش<span
                                                                    style="color: red;">*</span></label>
                                                                <select v-model="research_format"
                                                                        class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option disabled selected value="">انتخاب کنید
                                                                    </option>
                                                                    <option v-for="formats in research_formats"
                                                                            :value="formats.id">{{ formats.title }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >گروه علمی<span
                                                                    style="color: red;">*</span></label>
                                                                <select v-model="scientific_group"
                                                                        class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option disabled selected value="">انتخاب کنید
                                                                    </option>
                                                                    <option v-for="groups in scientific_groups"
                                                                            :value="groups.id">{{ groups.title }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >نوع پژوهش<span
                                                                    style="color: red;">*</span></label>
                                                                <select v-model="research_type"
                                                                        class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option disabled selected value="">انتخاب کنید
                                                                    </option>
                                                                    <option v-for="researchs in research_types"
                                                                            :value="researchs.id">
                                                                        {{ researchs.title }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >تعداد صفحات (برای مقاله
                                                                    ضروری میباشد.)</label>
                                                                <input type="number" v-model="page_number"
                                                                       class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >وضعیت نشر<span
                                                                    style="color: red;">*</span></label>
                                                                <select v-model="publish_status"
                                                                        class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option disabled selected value="">انتخاب کنید
                                                                    </option>
                                                                    <option value="منتشر نشده">منتشر نشده</option>
                                                                    <option value="منتشر شده">منتشر شده</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 flex-row">
                                                            <div class="relative w-full mb-3">
                                                                <label class="block uppercase  text-base font-bold mb-2"
                                                                >بخش ویژه</label>
                                                                <select v-model="special_section"
                                                                        class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option disabled selected value="">انتخاب کنید
                                                                    </option>
                                                                    <option v-for="specials in special_sections"
                                                                            :value="specials.id">
                                                                        {{ specials.title }}
                                                                    </option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="mt-8 px-8">
                                                    <div class="flex items-center ">
                                                        <span class="text-orange-500 pl-1">◼</span>
                                                        <h2 class="text-base font-bold  ">اطلاعات‌مشارکان</h2>
                                                        <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
                                                    </div>

                                                    <div class="w-full mt-6 mx-3 ">
                                                        <div>
                                                            <div class="flex items-center">
                                                                <span>نوع فعالیت: </span>
                                                                <div class="flex items-center">
                                                                    <select v-model="activityType"
                                                                            class="border border-colorborder px-3 py-1 mr-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                        <option value="fardi">فردی
                                                                        </option>
                                                                        <option value="moshtarak"> مشترک
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div v-if="activityType === 'moshtarak'"
                                                             class="mt-6  w-full lg:w-5/12 px-4 flex py-3 bg-blue-100 rounded-xl border border-colorborder">
                                                            <div class=" flex-row ">
                                                                <div class="relative w-full ">
                                                                    <img class="bg-blue-500 rounded-md p-1"
                                                                         src="build/assets/icons/Info Square.svg"
                                                                         alt="">
                                                                </div>
                                                            </div>
                                                            <div class="w-full flex-row">
                                                                <div class="relative w-full mr-3">
                                                                    <p class="mb-0">کاربر گرامی؛ لطفا اطلاعات مربوط به
                                                                        مشارکان اثر را
                                                                        وارد نمائید</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div v-if="activityType === 'moshtarak'"
                                                         class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                                                        <table class="w-full text-sm text-right">
                                                            <thead class="text-base text-black-3d bg-orange-fce ">
                                                            <tr class="text-center">
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
                                                                    درصد مشارکت
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
                                                            <tr class="bg-gray-d1d1 border-b border-gray-d1d1">
                                                                <th class=" text-center  px-6 py-4 font-medium text-gray-8484 whitespace-nowrap ">
                                                                    1
                                                                </th>
                                                                <th class=" text-center  px-6 py-4 font-medium text-black-8484 whitespace-nowrap ">
                                                                    {{ this.personalInfo[0]['name'] }}
                                                                </th>
                                                                <td class="px-6 py-4 text-center text-black-3d font-medium">
                                                                    {{ this.personalInfo[0]['family'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-black-3d font-medium">
                                                                    {{ this.personalInfo[0]['national_code'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-black-3d font-medium">
                                                                    {{ this.eduInfo[0]['shparvandetahsili'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center border-l-0 text-black-3d font-medium">
                                                                    <input v-model="Cooperation" type="text"
                                                                           name="column_1"
                                                                           class="w-12 py-2 shadow-sm rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="درصد">
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-black-3d font-medium">
                                                                    {{ this.contactInfo[0]['mobile'] }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-black-3d font-medium">

                                                                </td>

                                                            </tr>
                                                            <tr v-for="(row, index) in rows" :key="index"
                                                                :class="rowClass(index) + ' border-b border-gray-d1d1'">

                                                                <th scope="row"
                                                                    class=" text-center font-medium text-gray-8484 whitespace-nowrap "
                                                                    rowspan="1">
                                                                    {{ index + 2 }}
                                                                </th>
                                                                <td class="text-center border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.name" type="text"
                                                                           name="column_1"
                                                                           class="w-32 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="نام">
                                                                </td>
                                                                <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.lastname" type="text"
                                                                           name="column_1"
                                                                           class="w-40 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="نام خانوادگی">
                                                                </td>
                                                                <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.codemeli" type="text"
                                                                           name="column_1"
                                                                           class="w-40 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="کد ملی">
                                                                </td>
                                                                <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.filenumber" type="text"
                                                                           name="column_1"
                                                                           class="w-24 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="شماره پرونده">
                                                                </td>
                                                                <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.Cooperation" type="text"
                                                                           name="column_1"
                                                                           class="w-12 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="درصد">

                                                                </td>
                                                                <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                    <input v-model="row.phonenumber" type="text"
                                                                           name="column_1"
                                                                           class="w-32 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                           placeholder="شماره همراه">
                                                                </td>
                                                                <td class="text-center px-6 py-4 text-right border-l-0">
                                                                    <button @click="deleteRow(index)">
                                                                        <img class="bg-white rounded-md p-1"
                                                                             src="build/assets/icons/delete.png" alt="">
                                                                    </button>

                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                        <div class="flex justify-center items-center my-5">
                                                            <!--  :disabled="rows.length >= 10" if limit click btn to 10 -->
                                                            <button @click="addRow"
                                                                    class=" bg-br-f0e flex py-2 px-3 rounded-xl border border-colorborder">
                                                                <span><img class="w-7"
                                                                           src="build/assets/icons/Down Button.png"
                                                                           alt="down"></span>
                                                                <p class=" mb-0 font-bold px-4">افزودن مشارک</p>
                                                            </button>
                                                        </div>


                                                    </div>
                                                    <section>
                                                        <div class="my-8">
                                                            <div class="flex items-center ">
                                                                <span class="text-orange-500 pl-1">◼</span>
                                                                <h2 class="text-base font-bold">افزودن‌فایل‌اثر</h2>
                                                                <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="w-full lg:w-3/12 flex-row bg-white rounded-lg shadow">
                                                                <label for="file-upload"
                                                                       class="cursor-pointer flex justify-center items-center rounded-t-lg border-dashed border-4 border-colorborder border-b-0">
                                                                    <img class="p-8 py-8 rounded-t-lg"
                                                                         src="build/assets/icons/Paper Upload.png"
                                                                         alt="product image"/>
                                                                </label>
                                                                <input id="file-upload" name="file" type="file" ref="fileInput"
                                                                       class="hidden" accept=".pdf,.doc,.docx"
                                                                       v-on:change="checkFile"/>
                                                                <div
                                                                    class="bg-slate-200 border border-colorborder rounded-b-lg ">
                                                                    <div
                                                                        class="flex items-center justify-start px-5 py-3">
                                                                        <p>آپلود فایل اثر <br>(با پسوند PDF, Doc, Docx )
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            <div v-if="error"
                                                                 class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                                                 role="alert">
                                                                <strong class="font-bold">{{ error }}</strong>
                                                            </div>
                                                            <div v-if="nameFile"
                                                                 class="mt-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                                                 role="alert">
                                                                <strong class="font-bold">
                                                                    نام فایل انتخاب شده:
                                                                    {{ nameFile }}</strong>
                                                            </div>
                                                        </div>

                                                    </section>

                                                </div>
                                                <section v-if="activityType === 'Common'">
                                                    <div class="flex justify-center mb-8 mt-14">


                                                        <button
                                                            @click="handleButtonClick"
                                                            class="text-white bg-blue-500 hover:bg-blue-700  font-bold py-2 px-10 ml-8 rounded-xl">
                                                            <span>انتخاب برای ارسال به جشنواره</span>
                                                        </button>

                                                        <button @click="cancel3"
                                                                class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                            انصراف
                                                        </button>
                                                    </div>
                                                </section>

                                                <section v-else class="fardi">
                                                    <div class="flex justify-center mb-8 mt-24">

                                                        <button
                                                            @click="handleButtonClick2"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl">
                                                            <span class="text-white">ثبت اولیه اطلاعات</span>
                                                        </button>

                                                        <button @click="cancel3"
                                                                class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                            انصراف
                                                        </button>
                                                    </div>
                                                </section>
                                                <!-- show modal -->

                                                <transition enter-active-class="transition ease-out duration-100"
                                                            enter-class="opacity-0" enter-to-class="opacity-100"
                                                            leave-active-class="transition ease-in duration-75"
                                                            leave-class="opacity-100" leave-to-class="opacity-0">
                                                    <div v-if="showModal" class="fixed z-30 inset-0 overflow-y-auto">
                                                        <div
                                                            class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                            <div class="fixed inset-0 transition-opacity"
                                                                 aria-hidden="true">
                                                                <div
                                                                    class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                            </div>
                                                            <span
                                                                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                                aria-hidden="true">&#8203;</span>
                                                            <div
                                                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                                <div class="px-6 py-4">
                                                                    <img class="mx-auto my-8"
                                                                         src="build/assets/icons/Warning.png"
                                                                         alt="Image">
                                                                </div>
                                                                <div class="px-6 py-4 text-center">
                                                                    <p class="mb-14 font-bold">{{ message }}</p>
                                                                    <div class="flex justify-center pb-8">
                                                                        <form @submit.prevent="handleSubmit">
                                                                        <button
                                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl">
                                                                            بله
                                                                        </button>
                                                                        </form>
                                                                        <button @click="cancel"
                                                                                class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                                            خیر
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </transition>
<!--                                                </form>-->

                                                <!-- show modal 2 -->
                                                <transition enter-active-class="transition ease-out duration-100"
                                                            enter-class="opacity-0" enter-to-class="opacity-100"
                                                            leave-active-class="transition ease-in duration-75"
                                                            leave-class="opacity-100" leave-to-class="opacity-0">
                                                    <div v-if="showModal2" class="fixed z-40 inset-0 overflow-y-auto">
                                                        <div
                                                            class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                            <div class="fixed inset-0 transition-opacity"
                                                                 aria-hidden="true">
                                                                <div
                                                                    class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                            </div>
                                                            <span
                                                                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                                aria-hidden="true">&#8203;</span>
                                                            <div
                                                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                                <div class="px-6 pt-4">
                                                                    <img class="mx-auto mt-8"
                                                                         src="build/assets/icons/success.png"
                                                                         alt="Image">
                                                                </div>
                                                                <div class="px-6 pb-4 text-center ">
                                                                    <p class="mb-14 font-bold w-1/2 mx-auto">آثار انتخاب
                                                                        شده با موفقیت
                                                                        به دبیرخانه جشنواره ارسال شد
                                                                    </p>
                                                                    <div class="flex justify-center pb-8">

                                                                        <button @click="confirm"
                                                                                class="bg-white hover:bg-slate-200 border border-colorborder text-black py-2 px-10 rounded-xl">
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
                                </div>
                            </transition>

                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                            <table dir="rtl" class="w-full text-sm text-right">
                                <thead class="text-base text-black-3d bg-orange-fce ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        جشنواره
                                    </th>
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
                                    <td class="px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium">

                                    </td>
                                    <th scope="row"
                                        class=" text-center border-l border-gray-d1d1 px-6 py-4 font-medium text-gray-8484 whitespace-nowrap ">

                                    </th>
                                    <td class="px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium">

                                    </td>
                                    <td class="px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium">

                                    </td>
                                    <td class="px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium">

                                    </td>
                                    <td class="px-6 py-4 text-right border-l-0">
                                        <a href="#" class="font-medium">
                                            <img class="bg-white rounded-md border border-colorborder p-1"
                                                 src="build/assets/icons/Download.svg" alt="">
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>


                        <button @click="showModalLastSend = true"
                                class="bg-green-600 text-white font-bold py-2 px-4 mt-14 rounded-lg mx-auto block"
                        >
                            ارسال نهایی آثار به جشنواره
                        </button>
                        <transition enter-active-class="transition ease-out duration-100"
                                    enter-class="opacity-0" enter-to-class="opacity-100"
                                    leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModalLastSend" class="fixed z-10 inset-0 overflow-y-auto">
                                <div
                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity"
                                         aria-hidden="true">
                                        <div
                                            class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <span
                                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                        aria-hidden="true">&#8203;</span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="px-6 py-4">
                                            <img class="mx-auto my-8"
                                                 src="build/assets/icons/Warning.png"
                                                 alt="Image">
                                        </div>
                                        <div class="px-6 py-4 text-center">
                                            <p class="mb-14 font-bold">آثار وارد شده پس از تایید شما
                                                به دبیرخانه جشنواره ارسال خواهد شد.
                                                <br>
                                                پس از تایید، امکان ویرایش یا ارسال اثر دیگر وجود ندارد.
                                                آیا تایید می‌کنید؟</p>
                                            <div class="flex justify-center pb-8">
                                                <button @click="showModal2 = true"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl">
                                                    بله
                                                </button>
                                                <button @click="cancelshowModalLastSend"
                                                        class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                    خیر
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </transition>
                        <!-- show modal 2 -->
                        <transition enter-active-class="transition ease-out duration-100"
                                    enter-class="opacity-0" enter-to-class="opacity-100"
                                    leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModal2" class="fixed z-40 inset-0 overflow-y-auto">
                                <div
                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity"
                                         aria-hidden="true">
                                        <div
                                            class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <span
                                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                        aria-hidden="true">&#8203;</span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="px-6 pt-4">
                                            <img class="mx-auto mt-8"
                                                 src="build/assets/icons/success.png"
                                                 alt="Image">
                                        </div>
                                        <div class="px-6 pb-4 text-center ">
                                            <p class="mb-14 font-bold w-1/2 mx-auto">آثار انتخاب
                                                شده با موفقیت
                                                به دبیرخانه جشنواره ارسال شد
                                            </p>
                                            <div class="flex justify-center pb-8">

                                                <button @click="confirm"
                                                        class="bg-white hover:bg-slate-200 border border-colorborder text-black py-2 px-10 rounded-xl">
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
        </div>
    </section>


</template>


<script>
export default {
    props: ['nationalcode'],
    data() {
        return {
            rows: [
                {name: '', lastname: '', codemeli: '', filenumber: '', Cooperation: '', phonenumber: '',},
            ],
            Cooperation: '',
            showModal: false,
            showModal2: false,
            showModal3: false,
            activityType: 'fardi',
            fileSelected: false,
            fileName: "",
            error: null,
            nameFile: '',
            message: 'اطلاعات وارد شده را تایید می‌نمایید؟',
            personalInfo: [],
            contactInfo: [],
            eduInfo: [],
            research_formats: [],
            scientific_groups: [],
            research_types: [],
            special_sections: [],
            showModalLastSend: false,

            name:'',
            research_format:'',
            scientific_group:'',
            research_type:'',
            page_number:'',
            publish_status:'',
            special_section:'',
            file:'',



        };
    },
    mounted() {
        axios.get(`/api/users/getuserinfo/${this.nationalcode}/`)
            .then(response => {
                this.personalInfo = response.data;
            })
            .catch(error => {
                console.log(error)
            });
        axios.get(`/api/contact/${this.nationalcode}/`)
            .then(response => {
                this.contactInfo = response.data;
            })
            .catch(error => {
                console.log(error)
            });
        axios.get(`/api/edu/geteduinfo/${this.nationalcode}/`)
            .then(response => {
                this.eduInfo = response.data;
            })
            .catch(error => {
                console.log(error)
            });
        // axios.get(`/api/posts/allposts/`)
        //     .then(response => {
        //         this.eduInfo = response.data;
        //     })
        //     .catch(error => {
        //         console.log(error)
        //     });
        axios.get('/api/defaults/research_formats')
            .then(response => {
                this.research_formats = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        axios.get('/api/defaults/scientific_groups')
            .then(response => {
                this.scientific_groups = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        axios.get('/api/defaults/research_types')
            .then(response => {
                this.research_types = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        axios.get('/api/defaults/special_sections')
            .then(response => {
                this.special_sections = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    computed: {
        isSubmitButtonDisabled() {
            return !this.fileSelected;
        },
        rowClass() {
            return (index) => {
                return index % 2 === 0 ? 'bg-br-f0e' : 'bg-gray-d1d1'
            }
        }

    },
    methods: {
        handleSubmit() {
            const fileInput = this.$refs.fileInput;
            const file = fileInput.files[0];

            const formData = new FormData();

            formData.append('name', this.name);
            formData.append('research_format', this.research_format);
            formData.append('scientific_group', this.scientific_group);
            formData.append('research_type', this.research_type);
            formData.append('page_number', this.page_number);
            formData.append('publish_status', this.publish_status);
            formData.append('special_section', this.special_section);
            formData.append('activityType', this.activityType);
            this.rows.forEach(row => {
                formData.append('rows[][name]', row.name);
                formData.append('rows[][lastname]', row.lastname);
                formData.append('rows[][codemeli]', row.codemeli);
                formData.append('rows[][filenumber]', row.filenumber);
                formData.append('rows[][Cooperation]', row.Cooperation);
                formData.append('rows[][phonenumber]', row.phonenumber);
            });
            formData.append('file', file);
            axios.post(`/api/sendpost/this/`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        cancelshowModalLastSend() {
            this.showModalLastSend = false;
        },
        isTotalCooperationValid() {
            // Check if all required fields are filled
            const allFieldsFilled = this.rows.every(row => {
                return row.name && row.lastname && row.codemeli && row.filenumber && row.Cooperation && row.phonenumber && this.Cooperation;
            });
            if (!allFieldsFilled) {
                alert("لطفا تمامی فیلد هارا پر کنید!");
                return false;
            } else {
                // Check if total cooperation is valid
                const total = this.rows.reduce((acc, row) => acc + (parseInt(row.Cooperation) || 0), 0) + (parseInt(this.Cooperation) || 0);
                if (total === 100) {
                    return true;
                } else if (total > 100) {
                    alert('مجموع درصد مشارکت نمی‌تواند بیشتر از ۱۰۰ باشد.');
                } else {
                    alert('مجموع درصد مشارکت نمی‌تواند کمتر از ۱۰۰ باشد.');
                    return false;
                }
            }

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
                    this.error = false;
                    this.nameFile = event.target.files[0].name;

                    // this.showModal = true;
                }
            }
        },
        handleButtonClick(event) {
            if (this.isTotalCooperationValid()) {
                if (this.fileSelected) { // چک کردن اینکه آیا فایلی انتخاب شده یا خیر
                    this.showModal = true;
                } else {
                    this.error = 'خطا: فایلی انتخاب نشده است!'; // افزودن پیغام خطا در صورت عدم انتخاب فایل
                }
            } else {
                // انجام عملیات مورد نظر در صورت عدم برقراری شرط اعتبارسنجی
                // مثلا نمایش پیغام خطا یا انجام عملیات جایگزین
            }
        },
        handleButtonClick2(event) {

            if (this.fileSelected) { // چک کردن اینکه آیا فایلی انتخاب شده یا خیر
                this.showModal = true;
            } else {
                this.error = 'خطا: فایلی انتخاب نشده است!'; // افزودن پیغام خطا در صورت عدم انتخاب فایل
            }

        },


        addRow() {
            this.rows.push({name: '', lastname: '', codemeli: '', filenumber: '', Cooperation: '', phonenumber: '',});
            this.rows.push(newRow)
// add a duplicate row with the gray background color
            this.rows.push({...newRow})
        },
        deleteRow(index) {
            this.rows.splice(index, 1);
        },
        confirm() {
            this.showModal = false;
            this.showModal2 = false;
            this.showModalLastSend = false;
            this.showModal3 = false;
        },
        showModalsend() {
            this.showModal = true;
        },
        cancel() {
            this.showModal = false;
        },
        cancel2() {
            this.showModal2 = false;
        },

        confirm3() {
            this.showModal3 = false;
            this.showModal2 = false;
            this.showModal = false;
            this.nameFile = '';
            this.showModalLastSend = false;
            // location.reload();
        },
        cancel3() {
            this.showModal3 = false;
        },


    }
};
</script>

