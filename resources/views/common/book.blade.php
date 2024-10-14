<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .label {
            color: #98bdbd
        }

        .button {
            height: 36px;
            font-weight: 600;
            font-size: 12px !important;
            line-height: 18px;
            padding: 5px 15px !important;
            outline: none !important;
            cursor: pointer;
            text-decoration: none !important;

            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;

            text-transform: uppercase color: #FFF !important;
            border: 0 !important;

        }

        .submit-btn {
            border: 1px solid #0e9594;
            background-color: #0e9594;
        }

        .mt-3 {
            margin-top: 2rem;
        }

        .d-none {
            display: none;
        }

        .form-step {
            padding: 1.5rem;
        }

        ul.form-stepper {
            counter-reset: section;

        }

        ul.form-stepper .form-stepper-circle {
            position: relative;
        }

        ul.form-stepper .form-stepper-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .form-stepper-horizontal {
            position: relative;
            display: flex;
        }

        #userAccountSetupForm {
            flex: 1;


            position: relative;

            /* box-shadow: 0 0 10px rgba(255, 13, 13, 0.1); */
        }


        ul.form-stepper>li:not(:last-of-type) {
            margin-bottom: 0.625rem;
            -webkit-transition: margin-bottom 0.4s;
            -o-transition: margin-bottom 0.4s;
            transition: margin-bottom 0.4s;
        }

        .form-stepper-horizontal>li:not(:last-of-type) {
            margin-bottom: 0 !important;
        }

        .form-stepper-horizontal li {
            position: relative;
            display: flex;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        /* .form-stepper-horizontal li:not(:last-child):after {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        height: 1px;
        content: "";
        top: 32%;
    } */
        .form-stepper-horizontal li:after {
            background-color: #dee2e6;
        }

        .form-stepper-horizontal li.form-stepper-completed:after {
            background-color: #4da3ff;
        }

        .form-stepper-horizontal li:last-child {
            flex: unset;
        }

        ul.form-stepper li a .form-stepper-circle {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin-right: 0;
            line-height: 1.7rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.38);
            border-radius: 50%;
        }

        .form-stepper .form-stepper-active .form-stepper-circle {
            background-color: #41da5d !important;
            color: #fff;
        }

        .form-stepper .form-stepper-active .label {
            color: #fff !important;
        }

        .form-stepper .form-stepper-unfinished .form-stepper-circle {
            background-color: #98bdbd;
        }

        .form-stepper .form-stepper-completed .form-stepper-circle {
            background-color: #0e9594 !important;
            color: #fff;
        }

        .form-stepper .form-stepper-completed .label {
            color: #0e9594 !important;
        }

        .form-stepper .form-stepper-completed .form-stepper-circle:hover {
            background-color: #0e9594 !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-active span.text-muted {
            color: #fff !important;
        }

        .form-stepper .form-stepper-completed span.text-muted {
            color: #fff !important;
        }

        .form-stepper .label {
            /* font-size: 1rem; */
            font-weight: 500
        }

        .form-stepper a {
            cursor: default;
        }

        form section {
            position: relative;
        }

        /* form section  {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        } */
    </style>
</head>


<body>
    <x-home-layout>

        <div
            class="relative after:absolute after:top-0 after:w-full after:left-0 after:bg-green-100 after:bg-cover after:bottom-0  after:bg-[url('https://images.unsplash.com/photo-1499510318569-1a3d67dc3976?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] after:h-full after:z-[-1] bg-cover bg-center bg-no-repeat">



            <div
                class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:flex lg:h-[700px] lg:items-center lg:px-8 justify-center">
                <div class="max-w-xl">
                    <h1 class="text-xl font-extrabold sm:text-4xl text-white uppercase italic">
                        Book Your Slot Now
                    </h1>

                </div>
            </div>
        </div>

        <div
            class="flex-col lg:flex lg:flex-row lg:mx-36  mx-5 rounded-lg bg-[#08351c] h-full overflow-hidden   -mt-[300px]">
            <div>
                <ul
                    class="form-stepper form-stepper-horizontal lg:flex-1 text-center  flex-row lg:flex-col    rounded-sm min-[320px]:justify-center lg:p-7 lg:space-y-10 min-[320px]:px-5 min-[320px]:py-5 text-sm">

                    <li class="form-stepper-completed text-center form-stepper-list " step="1">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle">
                                    <span>1</span>
                                </span>
                                <div class="label hidden lg:block">Turf</div>
                            </div>
                        </a>
                    </li>

                    <li class="form-stepper-active text-center form-stepper-list" step="2">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle text-muted">
                                    <span>2</span>
                                </span>
                                <div class="label text-muted hidden lg:block">Amount</div>
                            </div>
                        </a>
                    </li>

                    <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle text-muted">
                                    <span>3</span>
                                </span>
                                <div class="label text-muted hidden lg:block">Date & Time</div>
                            </div>
                        </a>
                    </li>

                    <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle text-muted">
                                    <span>4</span>
                                </span>
                                <div class="label text-muted hidden lg:block">Inventory</div>
                            </div>
                        </a>
                    </li>



                    <li class="form-stepper-unfinished text-center form-stepper-list" step="5">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle text-muted">
                                    <span>5</span>
                                </span>
                                <div class="label text-muted hidden lg:block">Information</div>
                            </div>
                        </a>
                    </li>
                    <li class="form-stepper-unfinished text-center form-stepper-list" step="6">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle text-muted">
                                    <span>6</span>
                                </span>
                                <div class="label text-muted hidden lg:block">Play with</div>
                            </div>
                        </a>
                    </li>


                    <li class="form-stepper-unfinished text-center form-stepper-list" step="7">
                        <a class="mx-2">
                            <div class="flex gap-x-4 items-center">
                                <span class="form-stepper-circle text-muted">
                                    <span>7</span>
                                </span>
                                <div class="label text-muted hidden lg:block">Payment</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>


            <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data"
                class="w-full bg-gray-50" action="{{ route('booking') }}" method="post">
                @csrf
                <input type="hidden" name="turf_id" value="{{ $turf->id }}">
                <section id="step-1" class="form-step relative h-[40rem]  d-none">
                    <div class="bg-white shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-semibold text-lg">Select Turf</h2>
                    </div>
                    <div class="mt-3 h-full">
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5 h-full overflow-y-scroll scrollbar-none">

                            <button type="button"
                                class=" ring-primary  m-1 bg-white border-gray-200 rounded ring-1 hover:shadow-lg duration-300 dark:bg-gray-800 dark:border-gray-700  max-h-52"
                                {{-- step_number="2" --}} {{-- btn-navigate-form-step  --}}>
                                <label for="turf_select-{{ $turf->id }}" class="block  h-full pt-4">

                                    <img class="rounded-full  w-24 h-24 mx-auto"
                                        src="{{ $turf->thumbnail ? asset($turf->thumbnail) : 'https://pbs.twimg.com/profile_images/942334046100738048/n5kQVlRB_400x400.jpg' }}"
                                        alt="{{ $turf->thumbnail }}" />

                                    <div class="p-4">
                                        <div class="flex flex-col justify-between items-center">
                                            <h5 class="mb-2 text-md font-semibold text-gray-900 dark:text-white">
                                                {{ $turf->turf_name }}</h5>
                                            <span
                                                class="text-sm font-semibold text-gray-500 dark:text-white">{{ $turf->city->name }}</span>

                                        </div>
                                    </div>
                                </label>
                                <input type="radio" class=" hidden" name="turf_id" {{-- id="turf_select-{{ $turf->id }}" --}}>
                            </button>

                        </div>
                        <div
                            class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4 bg-gray-100">
                            <button disabled class="button  text-white bg-gray-500 border-0"
                                type="button">Prev</button>
                            <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                                step_number="2">Next</button>
                        </div>
                </section>

                <section id="step-2" class="form-step relative h-full  ">
                    <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-semibold text-lg">Amount</h2>
                    </div>
                    <div>
                        @if ($errors->any())
                            @foreach ($errors as $error)
                                {{ $error->getMessage() }}
                            @endforeach
                        @endif
                    </div>
                    @include('components.packages')
                    <div
                        class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4 bg-gray-100">
                        <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="1">Prev</button>
                        <button class="button text-white bg-gray-400 border-0 btn-navigate-form-step" type="button"
                            disabled step_number="3" id="get-package">Next</button>
                    </div>


                </section>



                <section id="step-3" class="form-step relative h-full  d-none">

                    <div class="bg-white shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-semibold text-lg">Slot Time</h2>
                    </div>
                    <div class="mt-3">
                        {{-- calander --}}
                        @include('components.calander')
                    </div>

                    <div
                        class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4 bg-gray-100">
                        <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="2">Prev</button>
                        <button class="button btn-navigate-form-step text-white bg-slate-500 border-0"
                            id="calender-next" type="button" step_number="4" disabled>Next</button>
                    </div>

                </section>

                {{-- Inventory Start --}}
                <section id="step-4" class="form-step relative h-full  d-none">
                    <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-semibold text-lg">Inventory</h2>
                    </div>


                    <div class="mt-3 flex justify-between items-center">


                        @include('components.inventory')
                    </div>
                    <div class="my-2 mt-4 flex justify-between">
                        <h4 class="font-semibold">Total Product Price: <span id="product-subtotal">0</span></h4>
                        <span id="add-product-form-btn">
                            <x-primary-button>Add Product</x-primary-button>
                        </span>
                    </div>

                    <div class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4">
                        <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="3">Prev</button>
                        <button class="button  btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="5">Next</button>

                    </div>

                </section>





                {{-- Information Start --}}

                <section id="step-5" class="form-step relative h-full d-none">
                    <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-semibold text-lg">Customer Information</h2>
                    </div>

                    <div class="mt-3 flex justify-between items-center">



                        <x-card>
                            @include('components.personal-information')
                        </x-card>
                        <div class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4">
                            <button class="button btn-navigate-form-step text-white bg-primary border-0"
                                type="button" step_number="4">Prev</button>
                            <button class="button  btn-navigate-form-step text-white bg-primary border-0"
                                type="button" step_number="6">Next</button>

                        </div>

                </section>

                {{-- Information End --}}


                <section id="step-6" class="form-step relative h-full d-none">
                    <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-semibold text-lg">Playing With</h2>
                    </div>
                    @include('components.playing-with')

                    <div class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4">
                        <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="5">Prev</button>
                        <button class="button  btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="7" id="calculate-subtotal">Next</button>

                    </div>

                </section>



                <section id="step-7" class="form-step relative h-full d-none">
                    <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                        <h2 class="font-normal">Payment Information</h2>
                    </div>
                    @include('components.booking-payment')
                    <div class="mt-3 flex justify-between items-center">
                        <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                            step_number="6">Prev</button>
                        <button class="button submit-btn text-white bg-primary border-0"
                            type="submit">Submit</button>

                    </div>
                </section>


            </form>


            <section id="step-3" class="form-step relative h-full  d-none">
                <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                    <h2 class="font-semibold text-lg">Slot Time</h2>
                </div>
                <div class="mt-3">
                    {{-- calander --}}
                    @include('components.calander')
                </div>
                <div class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4">
                    <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                        step_number="2">Prev</button>
                    <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                        step_number="4">Next</button>
                </div>

            </section>

            {{-- Inventory Start --}}
            <section id="step-4" class="form-step relative h-full d-none ">
                <div class="bg-slate-50 shadow-md px-4 py-4 rounded-md">
                    <h2 class="font-semibold text-lg">Inventory</h2>
                </div>
                @include('components.inventory')
                <div class="mt-3 flex justify-between items-center absolute bottom-0 left-0  w-full p-4">
                    <button class="button btn-navigate-form-step text-white bg-primary border-0" type="button"
                        step_number="3">Prev</button>
                    <button class="button  btn-navigate-form-step text-white bg-gray-500 border-0" type="button"
                        step_number="5">Next</button>
                </div>

            </section>


            </form>
        </div>
        </section>
        <script>
            const navigateToFormStep = (stepNumber) => {
                document.querySelectorAll(".form-step").forEach((formStepElement) => {
                    formStepElement.classList.add("d-none");
                });

                document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                    formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
                    formStepHeader.classList.add("form-stepper-unfinished");
                });

                document.querySelector("#step-" + stepNumber).classList.remove("d-none");

                const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
                formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
                formStepCircle.classList.add("form-stepper-active");

                for (let index = 1; index < stepNumber; index++) {
                    const formStepCircle = document.querySelector('li[step="' + index + '"]');
                    if (formStepCircle) {
                        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                        formStepCircle.classList.add("form-stepper-completed");
                    }
                }
            };

            document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
                formNavigationBtn.addEventListener("click", () => {
                    const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                    navigateToFormStep(stepNumber);
                });
            });
        </script>

        <script>
            $("input[name='package']").on('change', function() {
                if ($(this).is(':checked')) {
                    const packageId = $("input[name='package']:checked").val();
                    // console.log('package', packageId);
                    localStorage.setItem("packageId", packageId)
                    $("#get-package").removeAttr('disabled', "true")
                    $("#get-package").css({
                        background: "#05C46B"
                    })
                }
            });

            // calculate total price
            $("#calculate-subtotal").on('click', function() {

                let numOfSlots = 0;
                let packageId = localStorage.getItem("packageId");
                $.each($("input[name='selected_time[]']:checked"), function() {
                    numOfSlots++;
                })


                $.ajax({
                    url: `calculate-total/?turf={{ $turf->id }}&package_id=${packageId}"&numOfSlots=${numOfSlots}`,
                    method: "get",
                    dataType: "json",

                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        console.log('loading')
                    },
                    success: function(response) {
                        $("#total").html(response)
                        localStorage.setItem('total_price', response)
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });

            })
        </script>

    </x-home-layout>
</body>

</html>
