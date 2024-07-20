<x-dashboard>
    @slot('content')
    <div class="container">
        <h1 class="text-center pd-4">Jadwal Grooming</h1>
        <hr>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Jadwal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <x-form-grooming-schedule :url="route('admin.grooming.schedule.store')" :action="'store'" :schedule="''"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded">
            <div class="" id="calendar"></div>
        </div>
    </div>
    @endslot
    @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var event = {{Js::from($schedules)}}
            console.log(event);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                selectable: false,
                displayEventTime: false,
                events: event,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                },
                eventClick: function (info) {
                    var url = '{{ route("admin.grooming.schedule.edit", ["schedule" => ":id"]) }}';
                    url = url.replace(':id', info.event.extendedProps.grooming_schedule_id);
                    window.location = url
                },
            });
            calendar.render();
        })

    </script>
    @endpush
</x-dashboard>
