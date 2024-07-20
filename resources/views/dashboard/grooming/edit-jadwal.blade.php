<x-dashboard>
    @slot('content')
    <div class="container">
        <h1 class="text-center pd-4">Edit Jadwal Grooming</h1>
        <hr>
        <!-- Button trigger modal -->
        <x-form-grooming-schedule :url="route('admin.grooming.schedule.update', ['schedule' => $schedule])" :action="'update'" :schedule="$schedule"/>
    </div>
    @endslot
</x-dashboard>
