<template>
    <section dir="rtl" class="py-1">
        <div v-if="requestsCount>0" class="loading-modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="spinner"></div>
                <div class="loading-text">
                    <p class="typewriter">
                        دریافت اطلاعات آثار...
                    </p>
                </div>
            </div>
        </div>
        <div v-else class="w-full mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg  border-0">
                <div class="flex-auto  py-10 pt-0">

                    <div class="mt-8">
                        <div class="flex items-center">
                            <span class="text-orange-500 pl-1">◼</span>
                            <h2 class="text-base font-bold">آثار ثبت شده شما</h2>
                            <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                        </div>

                        <div class="flex items-center mt-4 gap-16">

                            <div
                                v-if="max_uploads.numbers!==0 && max_uploads.sent_status!==1 && showErrorNotSubmittedInfos===false && showErrorAgeRequirement!==true"
                                class="w-full lg:w-3/12 flex-row bg-white  rounded-lg shadow">
                                <!-- click open modal -->
                                <div @click="showNewPostModal"
                                     class=" cursor-pointer flex justify-center items-center rounded-t-lg  border-dashed border-4 border-colorborder border-b-0"
                                     href="#">
                                    <img class="p-8 py-8 rounded-t-lg" src="build/assets/icons/Paper Upload.png"
                                         alt="product image"/>
                                </div>
                                <div @click="showNewPostModal"
                                     class="bg-slate-200 border border-colorborder rounded-b-lg">
                                    <div class="cursor-pointer flex items-center justify-start px-5 py-3 ">
                                        <img class="w-8 ml-2" src="build/assets/icons/miniCircle 37181.png"
                                             alt="product image"/>
                                        <p class="m-0">اثر جدید</p>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="showErrorNotSubmittedInfos===true && showErrorAgeRequirement!==true"
                                 class=" mx-4 p-3 flex bg-red-100 rounded-xl border border-colorborder w-full">
                                <div class=" flex-row ">
                                    <div class="relative w-full">
                                        <img class="bg-red-500 rounded-md p-1"
                                             src="build/assets/icons/Info Square.svg" alt="">
                                    </div>
                                </div>
                                <div class="w-full flex-row">
                                    <div class="relative w-full mr-3">
                                        <p class="mb-0">کاربر گرامی؛ اطلاعات شما در سامانه ثبت نشده است. لطفا برای ثبت
                                            اثر جدید، در ابتدا اطلاعات خود را تکمیل نمایید.</p>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="showErrorAgeRequirement===true"
                                 class=" mx-4 p-3 flex bg-red-100 rounded-xl border border-colorborder w-full">
                                <div class=" flex-row ">
                                    <div class="relative w-full">
                                        <img class="bg-red-500 rounded-md p-1"
                                             src="build/assets/icons/Info Square.svg" alt="">
                                    </div>
                                </div>
                                <div class="w-full flex-row">
                                    <div class="relative w-full mr-3">
                                        <p class="mb-0">کاربر گرامی؛ شرط سنی شما برای شرکت به جشنواره مجاز نمی باشد.</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                v-if="max_uploads.numbers===0 && max_uploads.sent_status!==1 && showErrorAgeRequirement!==true">
                                <div class=" mx-4 p-3 flex bg-red-100 rounded-xl border border-colorborder w-full">
                                    <div class=" flex-row ">
                                        <div class="relative w-full">
                                            <img class="bg-red-500 rounded-md p-1"
                                                 src="build/assets/icons/Info Square.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="w-full flex-row">
                                        <div class="relative w-full mr-3">
                                            <p class="mb-0">کاربر گرامی؛ تعداد سه اثر در جشنواره با کد ملی شما ثبت شده
                                                است. در فهرست زیر می توانید تمامی آثار ثبت شده خود را مشاهده
                                                کرده و آثاری که وارد کرده اید را حذف یا ویرایش کنید.
                                            </p>
                                            <br>
                                            <p class="mb-0">چنانچه اثری به نام شما ثبت شده و متعلق به شما نیست، لطفا
                                                به هیچ وجه آثار خود را ارسال نهایی نکرده و به دبیرخانه
                                                جشنواره استان یا مدرسه خود گزارش دهید.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0"
                                        enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                        leave-class="opacity-100" leave-to-class="opacity-0">
                                <div v-if="showModal3" class="fixed z-30 inset-0 overflow-y-auto">
                                    <div
                                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75" @click="cancel3"></div>
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
                                                    class="mt-8 px-8 w-full lg:w-5/12 flex py-3   ">
                                                    <div
                                                        class=" flex bg-blue-100 p-3 rounded-xl border border-colorborder">

                                                        <div class="pl-2">
                                                            <img class="bg-blue-500 md:w-6 w-9 rounded-md p-1"
                                                                 src="build/assets/icons/Info Square.svg" alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 pt-1">کاربر گرامی؛ لطفا اطلاعات مربوط به اثر
                                                                خود
                                                                را تکمیل
                                                                نمائید</p>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="px-8 mt-4 flex items-center"><span
                                                    class="text-orange-500 pl-1">◼</span>
                                                    <h2 class="text-base font-bold">اطلاعات‌ اثر</h2>
                                                    <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                                                </div>
                                                <div class="flex flex-wrap mt-2 px-4">

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
                                                                        :value="formats.title">{{ formats.title }}
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
                                                                        :value="groups.title">{{ groups.title }}
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
                                                                        :value="researchs.title">
                                                                    {{ researchs.title }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row">
                                                        <div class="relative w-full mb-3">
                                                            <label class="block uppercase  text-base font-bold mb-2"
                                                            >تعداد صفحات
                                                                <span v-if="research_format==='مقاله'"
                                                                      style="color: red;">*</span>
                                                            </label>
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
                                                                        :value="specials.title">
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
                                                            class="w-full lg:w-3/12 mx-3 flex-row bg-white rounded-lg shadow">
                                                            <label for="fileInput"
                                                                   class="cursor-pointer flex justify-center items-center rounded-t-lg border-dashed border-4 border-colorborder border-b-0">
                                                                <img class="p-8 py-8 rounded-t-lg"
                                                                     src="build/assets/icons/Paper Upload.png"
                                                                     alt="product image"/>
                                                            </label>
                                                            <input id="fileInput" name="fileInput" type="file"
                                                                   ref="fileInput"
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
                                                            <div v-if="emptyErrors"
                                                                 class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                                                 role="alert">
                                                                <strong class="font-bold">{{ emptyErrors }}</strong>
                                                            </div>
                                                        </div>

                                                    </section>
                                                </div>

                                                <section v-if="activityType === 'moshtarak'">
                                                    <div class="flex justify-center mb-8 mt-14">

                                                        <button
                                                            @click="handleButtonClick"
                                                            :class="[handleButtonClick ? ' bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl cursor-pointer' : 'bg-red-500 opacity-50  hover:bg-red-700 cursor-not-allowed text-white font-bold py-2 px-10 ml-8 rounded-xl']">
                                                            <span :class="[checkFile ? ' text-white' : 'text-black']">ثبت اولیه اطلاعات</span>
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
                                                    <div v-if="showModal"
                                                         class="fixed  mt-0 z-30 inset-0 overflow-y-auto">
                                                        <div
                                                            class="flex items-end pb-48 justify-center min-h-full text-center ">
                                                            <div class="fixed inset-0 transition-opacity"
                                                                 aria-hidden="true">
                                                                <div class="absolute inset-0 bg-gray-500 opacity-75"
                                                                     @click="cancel"></div>
                                                            </div>
                                                            <span
                                                                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                                aria-hidden="true">&#8203;</span>
                                                            <div
                                                                class=" bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
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

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </transition>

                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                            <table dir="rtl" class="w-full text-sm text-right">
                                <thead class="text-base text-black-3d bg-orange-fce ">
                                <tr class="text-center">
                                    <th scope="col" class="px-6 py-3">
                                        جشنواره
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        قالب علمی
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        نام اثر
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        گروه علمی
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        نوع پژوهش
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        عملیات
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(post, index) in allPosts" :key="index"
                                    class="bg-gray-eee border-b border-gray-d1d1">
                                    <td class="text-center px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium w-10">
                                        {{ post.festival_title }}
                                    </td>
                                    <td class="text-center px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium w-32">
                                        {{ post.research_format }}
                                    </td>
                                    <td class="px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium w-fit">
                                        {{ post.title }}
                                    </td>
                                    <td class="text-center px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium w-44">
                                        {{ post.scientific_group }}
                                    </td>
                                    <td class="text-center px-6 py-4 border-l border-gray-d1d1 text-black-3d font-medium w-36">
                                        {{ post.research_type }}
                                    </td>
                                    <td class="px-6 py-4 text-right border-l border-gray-d1d1 w-36">
                                        <div class="flex justify-center">
                                            <img
                                                class="bg-white rounded-md border border-colorborder p-1 cursor-pointer"
                                                @click="downloadFile(post.file_src)"
                                                src="build/assets/icons/Download.svg" alt="" title="دانلود فایل اثر">

                                            <img
                                                class="bg-white rounded-md border border-colorborder p-1 cursor-pointer"
                                                @click="editPostShow(post.id)" v-if="post.sent===0"
                                                src="build/assets/icons/Edit Square.png"
                                                alt="">

                                            <img
                                                class="bg-white rounded-md border border-colorborder p-1 cursor-pointer"
                                                @click="reportRate(post.id)" v-if="post.sent===1"
                                                src="build/assets/icons/Document.svg" alt="" title="نمایش وضعیت">

                                            <img
                                                class="bg-white rounded-md border border-colorborder p-1 cursor-pointer"
                                                @click="deletePost(post.id)" v-if="post.sent===0"
                                                src="build/assets/icons/delete.png" alt="" title="حذف اثر">
                                        </div>

                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <button
                            v-if="max_uploads.sent_status===0 && showErrorNotSubmittedInfos===false && showLastSendButton===true && showErrorAgeRequirement!==true"
                            @click="showModalLastSend = true"
                            class="bg-green-600 text-white font-bold py-2 px-4 mt-14 rounded-lg mx-auto block"
                        >
                            ارسال نهایی آثار به جشنواره
                        </button>

                        <div v-if="max_uploads.sent_status===1" class="pt-5 flex justify-center ">
                            <div
                                class=" mx-4 p-3 flex bg-green-200 rounded-xl border border-colorborder w-9/12 items-center">
                                <div class=" flex-row ">
                                    <div class="relative w-full">
                                        <img class="bg-green-500 rounded-md p-1"
                                             src="build/assets/icons/Info Square.svg" alt="">
                                    </div>
                                </div>
                                <div class="w-full flex-row">
                                    <div class="relative w-full mr-3">
                                        <p class="mb-0">کاربر گرامی؛ آثار شما با موفقیت به جشنواره ارسال شده است. برای
                                            اطلاع از وضعیت ارزیابی، بر روی دکمه نمایش وضعیت کلیک کنید.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0"
                                    enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModalLastSend" class="fixed z-10 inset-0 overflow-y-auto">
                                <div @click="cancelshowModalLastSend"
                                     class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="px-6 py-4">
                                            <img class="mx-auto my-8" src="build/assets/icons/Warning.png" alt="Image">
                                        </div>
                                        <div class="px-6 py-4 text-center">
                                            <p class="mb-14 font-bold">آثار وارد شده پس از تایید شما
                                                به دبیرخانه جشنواره ارسال خواهد شد.
                                                <br>
                                                پس از تایید، امکان ویرایش یا ارسال اثر دیگر وجود ندارد.
                                                آیا تایید می‌کنید؟</p>
                                            <div class="flex justify-center pb-8">
                                                <button @click="confirm"
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

                        <transition enter-active-class="3 transition ease-out duration-100" enter-class="opacity-0"
                                    enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModalsuccess" class="fixed z-40 inset-0 overflow-y-auto">
                                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="px-6 pt-4">
                                            <img class="mx-auto mt-8" src="build/assets/icons/success.png" alt="Image">
                                        </div>
                                        <div class="px-6 pb-4 text-center ">
                                            <p class="mb-14 font-bold w-1/2 mx-auto">آثار انتخاب شده با موفقیت
                                                به دبیرخانه جشنواره ارسال شد
                                            </p>
                                            <div class="flex justify-center pb-8">

                                                <button @click="reloadPage"
                                                        class="bg-white hover:bg-slate-200 border border-colorborder text-black py-2 px-10 rounded-xl">
                                                    بستن
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </transition>

                        <!-- show modal 2 -->
                        <transition enter-active-class="3 transition ease-out duration-100" enter-class="opacity-0"
                                    enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModal2" class="fixed z-40 inset-0 overflow-y-auto">
                                <div
                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="px-6 pt-4">
                                            <img class="mx-auto mt-8" src="build/assets/icons/success.png" alt="Image">
                                        </div>
                                        <div class="px-6 pb-4 text-center ">
                                            <p class="mb-14 font-bold w-1/2 mx-auto">آثار انتخاب شده با موفقیت
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

                        <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0"
                                    enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModalArzyabi" class="fixed z-30 inset-0 overflow-y-auto">
                                <div
                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"
                                             @click="showModalArzyabi = false"></div>
                                    </div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-7xl w-full">

                                        <div dir="rtl" class="text-right rounded-xl border border-colorborder p-5">
                                            <div dir="rtl"
                                                 class="px-8 flex items-center justify-between py-3 bg-white border-t border-r border-l  rounded-t-xl">
                                                <div class="flex">
                                                <span class="pl-1">
                                                    <img src="build/assets/icons/Edit Square.png" alt="">
                                                </span>
                                                    <h2 class="text-base font-bold">وضعیت ارزیابی اثر ارسالی به
                                                        جشنواره</h2>
                                                </div>
                                            </div>


                                            <div class="border border-colorborder rounded-b-xl">
                                                <div class="mt-8 px-8">
                                                    <div class="flex items-center">
                                                        <span class="text-orange-500 pl-1">◼</span>
                                                        <h2 class="text-base font-bold">اطلاعات‌ تماس</h2>
                                                        <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap mx-4">

                                                    <div class="w-full lg:w-full px-4 flex-row py-3">
                                                        <span class="pl-1">نام اثر:</span>
                                                        <span>{{ this.postName }}</span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-1">گروه علمی:</span>
                                                        <span>{{ this.postScientificGroup }}</span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-1">نوع پژوهش:</span>
                                                        <span>{{ this.postResearchType }}</span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-1">بخش ویژه:</span>
                                                        <span class="pl-1">{{ this.postSpecialSection }}</span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-1">دوره شرکت:</span>
                                                        <span>{{ this.postFestivalTitle }}</span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-3">تاریخ ارسال به جشنواره:</span>
                                                        <span>{{ this.postSendDate }}</span>
                                                    </div>
                                                    <div class="w-full lg:w-full px-4 flex-row py-3">
                                                        <span class="pl-1">وضعیت فعلی:</span>
                                                        <span>{{ this.postCurrentStatus }}</span>
                                                    </div>

                                                </div>

                                                <div class="mt-4 px-8">
                                                    <div class="flex items-center">
                                                        <span class="text-orange-500 pl-1">◼</span>
                                                        <h2 class="text-base font-bold">وضعیت ارزیابی</h2>
                                                        <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap w-8/12 mx-4">

                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-1">مدرسه‌ای:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span class="pl-1">امتیاز:</span> <span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>برگزیده:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>استانی:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>امتیاز:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>برگزیده:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>کشوری:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>امتیاز:</span><span></span>
                                                    </div>
                                                    <div class="w-full lg:w-4/12 px-4 flex-row py-3">
                                                        <span>برگزیده:</span><span></span>
                                                    </div>

                                                </div>
                                                <div class="flex items-center justify-center gap-1  my-4">
                                                    <button class="border-2 border-gray-300 p-2 px-4 rounded-lg"
                                                            @click="cancelarzyabi">بستن
                                                    </button>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </transition>

                        <transition enter-active-class="transition ease-out duration-100" enter-class="opacity-0"
                                    enter-to-class="opacity-100" leave-active-class="transition ease-in duration-75"
                                    leave-class="opacity-100" leave-to-class="opacity-0">
                            <div v-if="showModalEdit" class="fixed z-30 inset-0 overflow-y-auto">
                                <div
                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"
                                             @click="hideModalEdit"></div>
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
                                                    <h2 class="text-base font-bold ">ویرایش اثر ثبت شده در جشنواره
                                                        {{ this.postFestivalTitle }}
                                                    </h2>
                                                </div>
                                                <div
                                                    class="flex items-center gap-1 border-2 border-gray-300 p-2 rounded-lg">
                                                    <button @click="hideModalEdit">بازگشت</button>
                                                    <span>🡠</span>
                                                </div>
                                            </div>

                                            <div
                                                class="mt-8 px-8 w-full lg:w-6/12 flex py-3   ">
                                                <div
                                                    class=" flex bg-blue-100 p-3 rounded-xl border border-colorborder">

                                                    <div class="pl-2">
                                                        <img class="bg-blue-500 md:w-6 w-9 rounded-md p-1"
                                                             src="build/assets/icons/Info Square.svg" alt="">
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 pt-1">کاربر گرامی؛ در صورت نیاز می توانید اطلاعات
                                                            ثبت شده اثر خود را ویرایش نمایید.</p>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="px-8 mt-4 flex items-center"><span
                                                class="text-orange-500 pl-1">◼</span>
                                                <h2 class="text-base font-bold">اطلاعات‌ اثر</h2>
                                                <hr class="flex-grow border-t-2 border-b-orange mr-4 mt-3">
                                            </div>
                                            <div class="flex flex-wrap mt-2 px-4">

                                                <div class="w-full lg:w-8/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >نام اثر<span
                                                            style="color: red;">*</span></label>
                                                        <input type="text" id="name" name="name" v-model="this.postName"
                                                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >قالب پژوهش<span
                                                            style="color: red;">*</span></label>
                                                        <select v-model="this.postResearchFormat"
                                                                class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                            <option disabled>انتخاب کنید
                                                            </option>
                                                            <option v-for="formats in research_formats"
                                                                    :selected="formats.title===this.postResearchFormat"
                                                                    :value="formats.title">{{ formats.title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >گروه علمی<span
                                                            style="color: red;">*</span></label>
                                                        <select v-model="this.postScientificGroup"
                                                                class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                            <option disabled>انتخاب کنید
                                                            </option>
                                                            <option v-for="groups in scientific_groups"
                                                                    :selected="groups.title===this.postScientificGroup"
                                                                    :value="groups.title">{{ groups.title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >نوع پژوهش<span
                                                            style="color: red;">*</span></label>
                                                        <select v-model="this.postResearchType"
                                                                class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                            <option disabled selected value="">انتخاب کنید
                                                            </option>
                                                            <option v-for="researchs in research_types"
                                                                    :selected="researchs.title===this.postResearchType"
                                                                    :value="researchs.title">
                                                                {{ researchs.title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >تعداد صفحات
                                                            <span v-if="research_format==='مقاله'"
                                                                  style="color: red;">*</span>
                                                        </label>
                                                        <input type="number" v-model="this.postPagesNumber"
                                                               class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold">
                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >وضعیت نشر<span
                                                            style="color: red;">*</span></label>
                                                        <select v-model="this.postPublishStatus"
                                                                class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                            <option disabled selected value="">انتخاب کنید
                                                            </option>
                                                            <option :selected="'منتشر نشده'===this.postResearchType"
                                                                    value="منتشر نشده">منتشر نشده
                                                            </option>
                                                            <option :selected="'منتشر شده'===this.postResearchType">
                                                                منتشر شده
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="w-full lg:w-4/12 px-4 flex-row">
                                                    <div class="relative w-full mb-3">
                                                        <label class="block uppercase  text-base font-bold mb-2"
                                                        >بخش ویژه</label>
                                                        <select v-model="this.postSpecialSection"
                                                                class="border border-colorborder px-3 py-3   bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                            <option disabled value=""
                                                                    :selected="null===this.postSpecialSection">انتخاب
                                                                کنید
                                                            </option>
                                                            <option v-for="specials in special_sections"
                                                                    :selected="specials.title===this.postSpecialSection"
                                                                    :value="specials.title">
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
                                                                <select v-model="this.postActivityType"
                                                                        class="border border-colorborder px-3 py-1 mr-3 bg-white rounded-lg text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 font-bold ">
                                                                    <option :selected="this.postActivityType==='fardi'"
                                                                            value="fardi">فردی
                                                                    </option>
                                                                    <option
                                                                        :selected="this.postActivityType==='moshtarak'"
                                                                        value="moshtarak"> مشترک
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div v-if="this.postActivityType === 'moshtarak'"
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

                                                <div v-if="this.postActivityType === 'moshtarak'"
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
                                                                *
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
                                                                <input v-model="this.postParticipationPercentage"
                                                                       type="text"
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
                                                        <tr v-for="(row, index) in postParticipants" :key="index"
                                                            class="bg-gray-d1d1 border-b border-gray-d1d1">
                                                            <th scope="row"
                                                                class=" text-center font-medium text-gray-8484 whitespace-nowrap "
                                                                rowspan="1">
                                                                *
                                                            </th>
                                                            <td class="text-center border-l-0 text-black-3d font-medium">
                                                                <input disabled type="text" v-model="row.name"
                                                                       class="w-32 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="نام">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input disabled type="text" v-model="row.family"
                                                                       class="w-40 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="نام خانوادگی">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input disabled type="text" v-model="row.national_code"
                                                                       class="w-40 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="کد ملی">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input disabled type="text" v-model="row.case_number"
                                                                       class="w-24 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="شماره پرونده">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input disabled type="text"
                                                                       v-model="row.participation_percentage"
                                                                       class="w-12 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="درصد">

                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input disabled type="text" v-model="row.mobile"
                                                                       class="w-32 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="شماره همراه">
                                                            </td>
                                                            <td class="text-center px-6 py-4 text-right border-l-0">
                                                                <button
                                                                    @click="deleteParticipant(row.id,index)">
                                                                    <img class="bg-white rounded-md p-1"
                                                                         src="build/assets/icons/delete.png" alt="">
                                                                </button>

                                                            </td>

                                                        </tr>
                                                        <tr v-for="(newrow, index) in rowsedited" :key="index"
                                                            :class="rowClass(index) + ' border-b border-gray-d1d1'">

                                                            <th scope="row"
                                                                class=" text-center font-medium text-gray-8484 whitespace-nowrap "
                                                                rowspan="1">
                                                                {{ index + 1 }}
                                                            </th>
                                                            <td class="text-center border-l-0 text-black-3d font-medium">
                                                                <input v-model="newrow.name" type="text"
                                                                       name="column_1"
                                                                       class="w-32 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="نام">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input v-model="newrow.lastname" type="text"
                                                                       name="column_1"
                                                                       class="w-40 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="نام خانوادگی">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input v-model="newrow.codemeli" type="text"
                                                                       name="column_1"
                                                                       class="w-40 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="کد ملی">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input v-model="newrow.filenumber" type="text"
                                                                       name="column_1"
                                                                       class="w-24 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="شماره پرونده">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input v-model="newrow.Cooperation" type="text"
                                                                       name="column_1"
                                                                       class="w-12 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="درصد">

                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0 text-black-3d font-medium">
                                                                <input v-model="newrow.phonenumber" type="text"
                                                                       name="column_1"
                                                                       class="w-32 py-2 shadow-sm  rounded-md bg-white text-center border border-colorborder"
                                                                       placeholder="شماره همراه">
                                                            </td>
                                                            <td class="text-center px-6 py-4 border-l-0">
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
                                                        <button @click="addEditedRow"
                                                                class=" bg-br-f0e flex py-2 px-3 rounded-xl border border-colorborder">
                                                                <span><img class="w-7"
                                                                           src="build/assets/icons/Down Button.png"
                                                                           alt="down"></span>
                                                            <p class=" mb-0 font-bold px-4">افزودن مشارک</p>
                                                        </button>
                                                    </div>


                                                </div>
                                                <section>

                                                    <div class="my-4">
                                                        <div class="flex items-center ">
                                                            <span class="text-orange-500 pl-1">◼</span>
                                                            <h2 class="text-base font-bold">افزودن‌فایل‌اثر</h2>
                                                            <hr class="w-full border-t-2 border-b-orange mr-4 mt-3">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 px-8 w-full lg:w-10/12 flex py-3   ">
                                                        <div
                                                            class=" flex bg-blue-100 p-3 rounded-xl border border-colorborder">

                                                            <div class="pl-2">
                                                                <img class="bg-blue-500 md:w-6 w-9 rounded-md p-1"
                                                                     src="build/assets/icons/Info Square.svg" alt="">
                                                            </div>
                                                            <div>
                                                                <p class="mb-0 pt-1">کاربر گرامی؛ در صورت نیاز به تغییر
                                                                    فایل اثر، از طریق کادر زیر فایل خود را انتخاب
                                                                    نمایید. در غیر این صورت هیچ فایلی انتخاب نکنید.</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-full lg:w-3/12 mx-3 flex-row bg-white rounded-lg shadow">
                                                        <label for="fileInput"
                                                               class="cursor-pointer flex justify-center items-center rounded-t-lg border-dashed border-4 border-colorborder border-b-0">
                                                            <img class="p-8 py-8 rounded-t-lg"
                                                                 src="build/assets/icons/Paper Upload.png"
                                                                 alt="product image"/>
                                                        </label>
                                                        <input id="fileInput" name="fileInput" type="file"
                                                               ref="fileInput"
                                                               class="hidden" accept=".pdf,.doc,.docx"
                                                               v-on:change="checkEditedFile"/>
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
                                                        <div v-if="emptyErrors"
                                                             class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                                             role="alert">
                                                            <strong class="font-bold">{{ emptyErrors }}</strong>
                                                        </div>
                                                    </div>

                                                </section>
                                            </div>

                                            <section v-if="activityType === 'moshtarak'">
                                                <div class="flex justify-center mb-8 mt-14">


                                                    <button

                                                        @click="editPostSend"
                                                        :class="[handleButtonClick ? ' bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl cursor-pointer' : 'bg-red-500 opacity-50  hover:bg-red-700 cursor-not-allowed text-white font-bold py-2 px-10 ml-8 rounded-xl']">
                                                        <span :class="[checkFile ? ' text-white' : 'text-black']">ثبت اولیه اطلاعات</span>
                                                    </button>

                                                    <button @click="hideModalEdit"
                                                            class="bg-white hover:bg-slate-200 border border-colorborder text-black font-bold py-2 px-10 rounded-xl">
                                                        انصراف
                                                    </button>
                                                </div>
                                            </section>

                                            <section v-else class="fardi">
                                                <div class="flex justify-center mb-8 mt-24">

                                                    <button
                                                        @click="editPostSend"
                                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 ml-8 rounded-xl">
                                                        <span class="text-white">ثبت اولیه اطلاعات</span>
                                                    </button>

                                                    <button @click="hideModalEdit"
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
                                                <div v-if="showModal"
                                                     class="fixed  mt-0 z-30 inset-0 overflow-y-auto">
                                                    <div
                                                        class="flex items-end pb-48 justify-center min-h-full text-center ">
                                                        <div class="fixed inset-0 transition-opacity"
                                                             aria-hidden="true">
                                                            <div class="absolute inset-0 bg-gray-500 opacity-75"
                                                                 @click="cancel"></div>
                                                        </div>
                                                        <span
                                                            class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                            aria-hidden="true">&#8203;</span>
                                                        <div
                                                            class=" bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
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
import jalaali from 'jalaali-js';
import _ from 'lodash'

export default {
    props: ['token'],
    data() {
        return {
            showLoading: false,
            requestsCount: 0,
            rows: [
                {name: '', lastname: '', codemeli: '', filenumber: '', Cooperation: '', phonenumber: '',},
            ],
            rowsedited: [
                {name: '', lastname: '', codemeli: '', filenumber: '', Cooperation: '', phonenumber: '',},
            ],
            Cooperation: '',
            showModal: false,
            showModal2: false,
            showModal3: false,
            showModalsuccess: false,
            showModalArzyabi: false,
            activityType: 'fardi',
            fileSelected: false,
            fileName: "",
            error: null,
            nameFile: '',
            message: 'اطلاعات وارد شده را تایید می‌نمایید؟',
            activeFestivalInfo: [],
            personalInfo: [],
            contactInfo: [],
            eduInfo: [],
            teachingInfo: [],
            research_formats: [],
            scientific_groups: [],
            research_types: [],
            special_sections: [],
            max_uploads: [],
            showModalLastSend: false,

            //send items
            name: '',
            research_format: '',
            scientific_group: '',
            research_type: '',
            page_number: '',
            publish_status: '',
            special_section: '',
            file: '',

            //errors
            emptyErrors: '',
            showErrorNotSubmittedInfos: false,
            showLastSendButton: false,
            showErrorAgeRequirement: '',

            //get all this user posts
            allPosts: [],

            //Rate Info
            rate: [],

            //Status Variables
            postName: '',
            postResearchFormat: '',
            postScientificGroup: '',
            postResearchType: '',
            postSpecialSection: '',
            postPagesNumber: '',
            postPublishStatus: '',
            postFestivalTitle: '',
            postActivityType: '',
            postSendDate: '',
            postCurrentStatus: '',
            postSchoolRateStatus: [],
            postProvinceRateStatus: [],
            postCenterRateStatus: [],

            //Edit
            showModalEdit: false,
            editPostInfo: [],
            postID: '',
            postParticipationPercentage: '',
            postParticipants: [],


        };
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
    mounted() {
        this.axiosReq();
    },
    methods: {
        showNewPostModal() {
            this.getResearchFormat();
            this.getScientificGroup();
            this.getResearchType();
            this.getSpecialSection();
            this.showModal3 = true
        },
        editPostShow(id) {
            this.getResearchFormat();
            this.getScientificGroup();
            this.getResearchType();
            this.getSpecialSection();
            this.showModalEdit = true;
            axios.get(`/posts/getPostInfo/${id}/`)
                .then(response => {
                    this.postID = response.data[0]['id'];
                    this.postName = response.data[0]['title'];
                    this.postResearchFormat = response.data[0]['research_format'];
                    this.postScientificGroup = response.data[0]['scientific_group'];
                    this.postResearchType = response.data[0]['research_type'];
                    this.postPagesNumber = response.data[0]['pages_number'];
                    this.postPublishStatus = response.data[0]['publish_status'];
                    this.postSpecialSection = response.data[0]['special_section'];
                    this.postFestivalTitle = response.data[0]['festival_title'];
                    this.postActivityType = response.data[0]['activity_type'];
                    if (response.data[0]['activity_type'] === 'moshtarak') {
                        this.postParticipationPercentage = response.data[0]['participation_percentage'];
                        axios.get(`/posts/getPostParticipants/this/${id}/`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                            .then(response => {
                                this.postParticipants = response.data;
                            })
                            .catch(error => {
                                console.log(error)
                            });
                    }
                })
                .catch(error => {
                    console.log(error)
                });

        },
        deleteParticipant(id, index) {
            if (confirm('این عملیات قابل بازگشت نمی باشد' +
                '\n' +
                'آیا برای پاک کردن مشارک مطمئن هستید؟')) {
                axios.post(`/posts/participant/delete/this/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(function () {

                    })
                    .catch(function (error) {
                        console.log(error);
                    }).finally(() => {
                    this.postParticipants.splice(index, 1);
                });
            }
        },
        editPostSend() {
            if (confirm('آیا مطمئن هستید؟')) {
                if (this.postPagesNumber < 0) {
                    alert('تعداد صفحات اشتباه وارد شده است.');
                    return false;
                }
                const fileInput = this.$refs.fileInput;
                const file = fileInput.files[0];

                const formData = new FormData();
                formData.append('id', this.postID);
                formData.append('name', this.postName);
                formData.append('research_format', this.postResearchFormat);
                formData.append('scientific_group', this.postScientificGroup);
                formData.append('research_type', this.postResearchType);
                formData.append('page_number', this.postPagesNumber);
                formData.append('publish_status', this.postPublishStatus);
                formData.append('special_section', this.postSpecialSection);
                formData.append('activityType', this.postActivityType);
                if (this.postActivityType === 'moshtarak') {
                    formData.append('myCooperation', this.postParticipationPercentage);
                    this.rowsedited.forEach(rowsedited => {
                        formData.append('rows[][name]', rowsedited.name);
                        formData.append('rows[][lastname]', rowsedited.lastname);
                        formData.append('rows[][codemeli]', rowsedited.codemeli);
                        formData.append('rows[][filenumber]', rowsedited.filenumber);
                        formData.append('rows[][Cooperation]', rowsedited.Cooperation);
                        formData.append('rows[][phonenumber]', rowsedited.phonenumber);
                    });
                }

                formData.append('file', file);
                axios.post(`/posts/updatepost/this`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(function (response) {

                    })
                    .catch(function (error) {
                        console.log(error);
                    }).finally(() => {
                    location.reload();
                });
            }
        },
        hideModalEdit() {
            this.showModalEdit = false;
        },
        reportRate(id) {
            this.showModalArzyabi = true;
            axios.get(`/posts/getPostInfo/${id}/`)
                .then(response => {
                    console.log(response.data);
                    this.postName = response.data[0]['title'];
                    this.postScientificGroup = response.data[0]['scientific_group'];
                    this.postResearchType = response.data[0]['research_type'];
                    this.postSpecialSection = response.data[0]['special_section'];
                    this.postFestivalTitle = response.data[0]['festival_title'];
                    this.postSendDate = this.convertToJalaali(response.data[0]['sent_at']);
                })
                .catch(error => {
                    console.log(error)
                });
            this.postName = '';

        },
        convertToJalaali(reqDate) {
            const date = new Date(reqDate);
            const jalaaliDate = jalaali.toJalaali(date.getFullYear(), date.getMonth() + 1, date.getDate());
            return `${jalaaliDate.jy}/${jalaaliDate.jm}/${jalaaliDate.jd}`;
        },
        axiosReq() {
            this.getTeachingInfo(this.token);
            this.getActiveFestivalInfo(this.token);
            this.getUserInfo(this.token);
            this.getContactInfo(this.token);
            this.getEduInfo(this.token);
            this.getAllPosts(this.token);
            this.getMaxUploads(this.token);
        },
        async getActiveFestivalInfo(token) {
            await axios.get(`/getactivefestival/${token}/`)
                .then(response => {
                        this.activeFestivalInfo = response.data;
                    }
                )
                .catch(error => {
                    console.log(error)
                }).finally(() => {
                    this.showLoading = false;
                })
        },
        async getUserInfo(token) {
            await axios.get(`/users/getuserinfo/${token}/`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.personalInfo = response.data;
                    if (response.data[0]['personalImageSrc'] === null) {
                        this.showErrorNotSubmittedInfos = true;
                    } else {
                        let myBirthDate = response.data[0]['birthdate'];
                        let chunksmyBirthDate = [];
                        for (let i = 0, len = myBirthDate.length; i < len; i += 4) {
                            chunksmyBirthDate.push(myBirthDate.substring(i, i + 4));
                        }

                        let activeFestivalDate = this.activeFestivalInfo[0]['finish_date'];
                        let chunksActiveFestivalDate = [];
                        for (let i = 0, len = activeFestivalDate.length; i < len; i += 4) {
                            chunksActiveFestivalDate.push(activeFestivalDate.substring(i, i + 4));
                        }

                        switch (this.teachingInfo[0]['isMaster']){
                            case 'بله':
                                if (chunksActiveFestivalDate[0]-chunksmyBirthDate[0]<=50){
                                    this.showErrorAgeRequirement=false;
                                }else{
                                    this.showErrorAgeRequirement=true;
                                }
                                break;
                            case 'خیر':
                                if (chunksActiveFestivalDate[0]-chunksmyBirthDate[0]<=35){
                                    this.showErrorAgeRequirement=false;
                                }else{
                                    this.showErrorAgeRequirement=true;
                                }
                                break;
                        }
                    }
                })
                .catch(error => {
                    console.log(error)
                }).finally(() => {
                    this.showLoading = false;
                })
        }
        ,
        async getContactInfo(token) {
            await axios.get(`/contact/${token}/`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.contactInfo = response.data;
                    if (response.data[0]['approved'] === 0) {
                        this.showErrorNotSubmittedInfos = true;
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
        ,
        async getEduInfo(token) {
            await axios.get(`/edu/geteduinfo/${token}/`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.eduInfo = response.data;
                    if (response.data[0]['approved'] === 0) {
                        this.showErrorNotSubmittedInfos = true;
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
        ,
        async getTeachingInfo(token) {
            await axios.get(`/teaching/${token}/`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.teachingInfo = response.data;
                    if (response.data[0]['approved'] === 0) {
                        this.showErrorNotSubmittedInfos = true;
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
        ,
        async getAllPosts(token) {
            axios.get(`/posts/allposts/user/${token}/`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.allPosts = response.data.posts;
                    if (Array.isArray(response.data.posts) && response.data.posts.length !== 0) {
                        this.showLastSendButton = true;
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
        ,
        async getResearchFormat() {
            axios.get('/defaults/research_formats', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.research_formats = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
        ,
        async getScientificGroup() {
            await axios.get('/defaults/scientific_groups', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.scientific_groups = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
        ,
        async getResearchType() {
            await axios.get('/defaults/research_types', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.research_types = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
        ,
        async getSpecialSection() {
            await axios.get('/defaults/special_sections', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.special_sections = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
        ,
        async getMaxUploads() {
            await axios.get(`/defaults/maxUploads/${this.token}/`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    this.max_uploads = response.data[0];
                })
                .catch(error => {
                    console.log(error);
                })
        }
        ,
        deletePost(id) {
            if (confirm('این عملیات قابل بازگشت نمی باشد' +
                '\n' +
                'آیا مطمئن هستید؟')) {
                axios.post(`/posts/delete/this/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(function (response) {
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    }).finally(() => {
                    location.reload();
                });
            }
        }
        ,
        lastSendFunction() {
            axios.post(`/posts/approve/last/send/${this.token}/`, {
                approved: 1
            }, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
            // this.showModal2 = true;

        }
        ,
        downloadFile(fileSrc) {
            window.open('storage/' + fileSrc.slice(7), '_blank');
        }
        ,
        handleSubmit() {
            const fileInput = this.$refs.fileInput;
            const file = fileInput.files[0];

            const formData = new FormData();

            formData.append('id', this.postID);
            formData.append('name', this.name);
            formData.append('research_format', this.research_format);
            formData.append('scientific_group', this.scientific_group);
            formData.append('research_type', this.research_type);
            formData.append('page_number', this.page_number);
            formData.append('publish_status', this.publish_status);
            formData.append('special_section', this.special_section);
            formData.append('activityType', this.activityType);
            if (this.activityType === 'moshtarak') {
                formData.append('myCooperation', this.Cooperation);
                this.rows.forEach(row => {
                    formData.append('rows[][name]', row.name);
                    formData.append('rows[][lastname]', row.lastname);
                    formData.append('rows[][codemeli]', row.codemeli);
                    formData.append('rows[][filenumber]', row.filenumber);
                    formData.append('rows[][Cooperation]', row.Cooperation);
                    formData.append('rows[][phonenumber]', row.phonenumber);
                });
            }
            formData.append('file', file);
            axios.post(`/sendpost/this/${this.token}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(function (response) {
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        ,
        cancelshowModalLastSend() {
            this.showModalLastSend = false;
        }
        ,
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
                    if (this.rows.some(row => row.codemeli.length !== 10)) {
                        alert('کد ملی یک یا چند نفر از مشارکان اشتباه وارد شده است');
                        return false;
                    } else if (this.rows.some(row => row.phonenumber.length !== 11)) {
                        alert('تلفن همراه یک یا چند نفر از مشارکان اشتباه وارد شده است');
                        return false;
                    } else {
                        return true;
                    }
                } else if (total > 100) {
                    alert('مجموع درصد مشارکت نمی‌تواند بیشتر از ۱۰۰ باشد.');
                } else {
                    alert('مجموع درصد مشارکت نمی‌تواند کمتر از ۱۰۰ باشد.');
                    return false;
                }
            }

        }
        ,
        checkEditedFile(event) {
            this.nameFile = '';
            const file = event.target.files[0];
            const allowedExtensions = /(\.pdf|\.doc|\.docx)$/i;
            if (!allowedExtensions.test(file.name)) {
                this.fileSelected = false;
                this.fileName = "";
                this.error = 'خطا: پسوند فایل مجاز نیست!';
            } else {
                this.fileSelected = true;
                this.error = false;
                this.nameFile = event.target.files[0].name;
            }
        }
        ,
        checkFile(event) {
            this.nameFile = '';
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
                }
            }
        }
        ,
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
        }
        ,
        handleButtonClick2(event) {
            if (!this.name) {
                this.emptyErrors = 'نام اثر وارد نشده است.';
            } else if (!this.research_format) {
                this.emptyErrors = 'قالب پژوهش انتخاب نشده است.';
            } else if (!this.scientific_group) {
                this.emptyErrors = 'گروه علمی انتخاب نشده است.';
            } else if (!this.research_type) {
                this.emptyErrors = 'نوع پژوهش انتخاب نشده است.';
            } else if (!this.page_number && this.research_format === 'مقاله') {
                this.emptyErrors = 'تعداد صفحات وارد نشده است.';
            } else if (this.page_number < 0) {
                this.emptyErrors = 'تعداد صفحات اشتباه وارد شده است.';
            } else if (!this.publish_status) {
                this.emptyErrors = 'وضعیت نشر انتخاب نشده است.';
            } else {
                this.emptyErrors = '';
                if (this.fileSelected) { // چک کردن اینکه آیا فایلی انتخاب شده یا خیر
                    this.showModal = true;
                } else {
                    this.error = 'خطا: فایلی انتخاب نشده است!'; // افزودن پیغام خطا در صورت عدم انتخاب فایل
                }
            }
        }
        ,
        addRow() {
            const newRow = {name: '', lastname: '', codemeli: '', filenumber: '', Cooperation: '', phonenumber: ''};
            this.rows.push({...newRow});
        }
        ,
        addEditedRow() {
            const newRow = {name: '', lastname: '', codemeli: '', filenumber: '', Cooperation: '', phonenumber: ''};
            this.rowsedited.push({...newRow});
        }
        ,
        deleteRow(index) {
            this.rows.splice(index, 1);
        }
        ,
        confirm() {
            this.lastSendFunction();
            this.showModal = false;
            this.showModalsuccess = false;
            this.showModal2 = false;
            this.showModalLastSend = false;
            this.showModal3 = false;
            this.showModalsuccess = true
        }
        ,
        showModalsend() {
            this.showModal = true;
        }
        ,
        cancel() {
            this.showModal = false;
        }
        ,
        cancel2() {
            this.showModal2 = false;
        }
        ,
        cancelarzyabi() {
            this.showModalArzyabi = false;
        }
        ,
        cancel3() {
            this.showModal3 = false;
        }
        ,
        reloadPage() {
            location.reload();
        }
    }
}
;
</script>

