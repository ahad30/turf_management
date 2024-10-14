<div class="flex space-x-3 mb-4 max-w-[850px]">
    <div class="lg:w-[55%] ">
        <p class="mb-2 font-semibold text-gray-500 text-center">Select Date</p>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <script src="{{ asset('assets/js/jquery.js') }}"></script>
            {{-- ajax  --}}
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <style>
                .current-day {
                    /* background-color: #4CAF50; */
                    /* color: white; */
                }

                .calender td,
                th {
                    /* padding: 8px; */
                    text-align: center;
                }

                .calender tbody td div {

                    margin: 2px;
                    padding: 5px;
                    text-align: center;
                    background: rgb(240, 240, 240) !important;
                    border-radius: 5px;

                }
            </style>

        </head>

        <body class="bg-gray-100 p-6">

            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">


                <table class="w-full  calender">
                    <thead class="">
                        <th class="text-center pt-2 " colspan="2">
                            <button type="button" class="text-gray-400 hover:text-gray-500 transition"
                                id="previus-month">
                                <ion-icon name="arrow-back-outline"></ion-icon>
                            </button>
                        </th>
                        <th class="text-center text-primary " colspan="3" id="date-title">January, 2024</th>
                        <th class="text-center  pt-2" colspan="2">
                            <button type="button"class="text-gray-400 hover:text-gray-500 transition" id="next-month">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </button>
                        </th>
                    </thead>
                    <thead>
                        <tr class="border-b-2 pb-1">
                            <th class="w-5 h-5">Sun</th>
                            <th class="w-5 h-5">Mon</th>
                            <th class="w-5 h-5">Tue</th>
                            <th class="w-5 h-5">Wed</th>
                            <th class="w-5 h-5">Thu</th>
                            <th class="w-5 h-5">Fri</th>
                            <th class="w-5 h-5">Sat</th>
                        </tr>
                    </thead>

                    <tbody id="calendar-body">
                    </tbody>
                </table>
            </div>
            <button type="submit">submit</button>
            <script>
                function bindCheckboxChangeEvent() {

                    $('input[name="selected_time[]"]').on('change', function() {
                        if ($(this).is(':checked')) {
                            console.log('Checkbox checked. Value:', JSON.stringify($('input[name="selected_time[]"]')
                                .val()));
                            // Additional logic if needed
                            // activing next button
                            $("#calender-next").removeAttr('disabled', true);
                            $("#calender-next").css({
                                background: "#05C46B"
                            })
                        } else {
                            console.log('Checkbox unchecked. Value:', $('input[name="selected_time[]"]').val());
                            // Additional logic if needed
                        }
                    });

                }

                function fetchSlots(date, month, year) {
                    const packageId = localStorage.getItem("packageId")
                    $.ajax({
                        url: `/slots/{{ $turf->id }}/${date}/${month}/${year}/${packageId}`,
                        method: 'get',
                        dataType: 'json',
                        beforeSend: function() {
                            $("#timing-slots").html('loading...')
                        },
                        success: function(data) {
                            //   setting branch id for inventory page
                            localStorage.setItem('branch_id', data?.branch_id)
                            // getting slots
                            var slots = "";
                            $.each(data.slots, function(index, item) {

                                if (item[0]?.from) {
                                    var slotIds = [];
                                    $.each(item, function(index, slot) {
                                        slotIds[index] = slot?.id
                                    })

                                    slots += `<div class="flex selected-time -${index}" ><input type="checkbox" class="peer hidden" name="selected_time[]" value="[${slotIds}]" id="slot-${index}"/><label for="slot-${index}" class="bg-gray-100 text-gray-500 font-medium p-2 text-xs rounded-md cursor-hover peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary"
                                       >
                                        <p>${item[0]?.from}</p>
                                        <p>${item[item.length-1]?.to}</p>
                                    </label></div>`
                                } else {
                                    item = Object.values(item);

                                    var slotIds = [];
                                    $.each(item, function(index, slot) {
                                        slotIds[index] = slot?.id

                                    })
                                    slots += `<div class="flex selected-time -${index}"><input type="checkbox" class="peer hidden" name="selected_time[]" value="[${slotIds}]" id="slot-${index}"/><label for="slot-${index}" class="bg-gray-100 text-gray-500 font-medium p-2 text-xs rounded-md cursor-hover peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary "
                                       >
                                       <p>${item[0]?.from}</p>
                                        <p>${item[item.length-1]?.to}</p>
                                    </label></div>`


                                }
                                // getting slots as input
                            })

                            $('#timing-slots').html(slots)

                            bindCheckboxChangeEvent()
                        }

                    });



                }
                let month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                    "November", "December"
                ];

                function generateCalendar(year, month) {
                    const calendarBody = $('#calendar-body');
                    calendarBody.html('');

                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDay = new Date(year, month + 1, 0).getDate();

                    let dateCounter = 1;

                    for (let i = 0; i < 6; i++) {
                        const row = calendarBody[0].insertRow(i);

                        for (let j = 0; j < 7; j++) {
                            if (i === 0 && j < firstDay) {
                                // If it's the first row and the current cell is before the first day of the month, continue to the next iteration.
                                const cell = row.insertCell(j);
                                cell.textContent = ""; // Leave the cell empty
                            } else if (dateCounter <= lastDay) {
                                // If the date counter is within the valid range of days in the month, create a cell and set its content.
                                const cell = row.insertCell(j);
                                if (today.getMonth() == month) {
                                    if (dateCounter >= today.getDate()) {
                                        cell.innerHTML = `<div class="text-center pt-2">
                                    <input type="radio" name="date" id="date-${dateCounter}" class="peer hidden">
                                         <label for="date-${dateCounter}" class="relative date-${dateCounter} cursor-pointer  grid place-content-center ">
                                      <p>${dateCounter}
                                       </p>
                                         </label>
                                     </div>`;

                                        $(`.date-${dateCounter}`).on('click', function() {
                                            //    ajax request here
                                            // alert($(this).find('p').html())
                                            // alert(today.getMonth())
                                            fetchSlots(dateCounter, month, year)
                                        })
                                    } else {
                                        cell.innerHTML = `<div class="relative date text-gray-400 cursor-not-allowed"><p>${dateCounter}</p>
                                    </div>`;
                                    }

                                } else {
                                    if (dateCounter < today.getDate()) {
                                        cell.innerHTML = `<div class="text-center pt-2">
                                    <input type="radio" name="date" id="date-${dateCounter}" class="peer hidden">
                                         <label for="date-${dateCounter}" class="relative date-${dateCounter} cursor-pointer  grid place-content-center ">
                                      <p>${dateCounter}
                                       </p>
                                         </label>
                                     </div>`;

                                        $(`.date-${dateCounter}`).on('click', function() {
                                            //    ajax request here
                                            // alert($(this).find('p').html())
                                            // alert(today.getDate())
                                            fetchSlots(dateCounter, month, year)
                                        })
                                    } else {
                                        cell.innerHTML = `<div class="relative date text-gray-400 cursor-not-allowed"><p>${dateCounter}</p>
                                    </div>`;
                                    }
                                }


                                if (dateCounter === new Date().getDate() && month === new Date().getMonth() && year ===
                                    new Date()
                                    .getFullYear()) {
                                    cell.classList.add('current-day');

                                }

                                dateCounter++;
                            } else {
                                // If dateCounter exceeds the last day of the month, leave the remaining cells empty.
                                const cell = row.insertCell(j);
                                cell.textContent = "";
                            }
                        }
                    }
                }

                const today = new Date();
                generateCalendar(today.getFullYear(), today.getMonth());

                $("#date-title").html(`${ month[today.getMonth()]}, ${today.getFullYear()}`)
                // tot get next month calender
                $("#next-month").on('click', function() {
                    if (today.getMonth() == 12) {
                        // when its december
                        generateCalendar(today.getFullYear() + 1, 1);
                        $("#date-title").html(`${ month[0]}, ${today.getFullYear()+1}`)
                    } else {
                        generateCalendar(today.getFullYear(), today.getMonth() + 1);
                        $("#date-title").html(`${ month[today.getMonth()+1]}, ${today.getFullYear()}`)
                    }
                    $(this).attr('disabled', true);
                    $("#previus-month").removeAttr('disabled', true);

                });
                // to get previus month calender
                $("#previus-month").on('click', function() {
                    if (today.getMonth() == 1) {
                        // when its january
                        generateCalendar(today.getFullYear() - 1, 12);
                        $("#date-title").html(`${ month[11]}, ${today.getFullYear()}`)
                    } else {
                        generateCalendar(today.getFullYear(), today.getMonth());
                        $("#date-title").html(`${ month[today.getMonth()]}, ${today.getFullYear()}`)
                    }
                    $(this).attr('disabled', true);
                    $("#next-month").removeAttr('disabled', true);
                });
            </script>

        </body>

        </html>
    </div>

    {{-- select time  --}}
    <div class="lg:w-[45%] ">
        <p class="mb-2 font-semibold text-gray-500 text-center">Select Slot</p>
        <x-card>
            <table class=" w-full">
                {{-- <thead class="border-b-2 ">
                    <th class="text-center text-primary p-1" id="">27-01-2024</th>
                </thead> --}}
                <tbody>
                    <tr>
                        <td>
                            <div class="grid grid-cols-3  gap-2 h-60 overflow-y-scroll scrollbar-none pt-2 p-1"
                                id="timing-slots"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-card>
    </div>

</div>
