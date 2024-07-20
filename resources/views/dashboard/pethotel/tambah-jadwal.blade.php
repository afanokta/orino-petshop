<x-dashboard>
    @slot('content')
    <div class="container">
        <h1 class="text-center pd-4">Jadwal Grooming</h1>
        <hr>
        <div class="bg-white p-4 rounded">
            <div class="" id="calendar"></div>
        </div>
    </div>
    @endslot
    @push('script')
        <script>
            function scrollToForm() {
                var element = document.getElementById('pesanpethotel');
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            document.getElementById('groomingForm').addEventListener('input', function() {
                var allFieldsFilled = true;
                var formFields = this.querySelectorAll('input[required], select[required]');
                formFields.forEach(function(field) {
                    if (!field.value.trim() || (field.type === 'checkbox' && !field.checked)) {
                        allFieldsFilled = false;
                    }
                });

                var setujuCheck = document.getElementById('setujuCheck');
                var submitBtn = document.getElementById('submitBtn');

                if (allFieldsFilled && setujuCheck.checked) {
                    submitBtn.removeAttribute('disabled');
                } else {
                    submitBtn.setAttribute('disabled', 'true');
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var invalidDates = {!! json_encode($invalidDates) !!}
                var events = {!! Js::from($schedules) !!};
                invalidDates.forEach(function(element) {
                    events.push({
                        start: element,
                        end: element,
                        display: "background",
                        overlap: false
                    })
                })
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                    },
                    events: events,
                    select: (selectionInfo) => {
                        var end_date  = moment(selectionInfo.end).subtract(1, 'days').format('YYYY-MM-DD')
                        var start_date = moment(selectionInfo.start).format('YYYY-MM-DD')
                        var url = '{{ route("admin.pethotel.create")}}'+`?start_date=${start_date}&end_date=${end_date}`
                        window.location = url
                    },
                    // select: function(selectInfo) {
                    //     $('input[name=start_date]').val(selectInfo.startStr)
                    //     var end_date = new Date(selectInfo.endStr)
                    //     var end_date_str = new Date(end_date.setDate(end_date.getDate() - 1))
                    //         .toLocaleDateString('en-CA')
                    //     $('input[name=end_date]').val(end_date_str)

                    //     invalidDates.forEach((element) => {
                    //         invalid = new Date(element).getTime()
                    //         start_date = new Date(selectInfo.startStr).getTime()
                    //         end_date = new Date(selectInfo.endStr).getTime()
                    //         if (start_date <= invalid && end_date >= invalid) {
                    //             Swal.fire({
                    //                 title: 'Hari yang anda pilih sudah penuh!',
                    //                 text: 'Silahkan Memilih Hari Lain',
                    //                 icon: 'error',
                    //                 confirmButtonText: 'Tutup'
                    //             })
                    //             $('input[name=start_date]').val("")
                    //             $('input[name=end_date]').val("")
                    //         }
                    //     })
                    // },
                    validRange: {
                        start: Date.parse('{{ $date_start }}'),
                        end: Date.parse('{{ $date_end }}')
                    }
                });
                calendar.render();
            });
            $(document).ready(function() {
                $('input[type=radio][name=sesi]').change(function() {
                    time = this.value
                    $('input[name=session]').val(time)
                })
            })
        </script>
    @endpush
</x-dashboard>
