

<x-layout title="Add Departmant to Course" heading="Course Departmant">
            <div class="content">
                <div class="box">
                    <h2>Add Departmant to Course</h2>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('courseassignments') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="col-md-12 mb-3">
        <label class="form-label fw-bold">Course / Department / Level</label>
        <select name="coursedepartment_id" class="form-select" required>
            <option value="">-- Select Course --</option>

            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course->coursecode }}
                    -
                    {{ $course->course->coursetitle }}
                    |
                    {{ $course->department }}
                    |
                    {{ $course->award_in_view }}
                    |
                    Level {{ $course->level }}
                </option>
            @endforeach

        </select>
    </div>

    <!-- Exam Date -->
    <div class="col-md-4 mb-3">
        <label class="form-label fw-bold">Exam Date</label>
        <input
            type="date"
            name="exam_date"
            class="form-control"
            required>
    </div>

    <!-- Exam Time -->
    <div class="col-md-4 mb-3">
        <label class="form-label fw-bold">Exam Time</label>
        <input
            type="time"
            name="exam_time"
            class="form-control"
            required>
    </div>

    <!-- Duration -->
    <div class="col-md-4 mb-3">
        <label class="form-label fw-bold">Duration (Minutes)</label>
        <input
            type="number"
            name="duration_minutes"
            class="form-control"
            min="1"
            placeholder="e.g. 60"
            required>
    </div>

    <!-- Excel Upload -->
    <div class="col-md-12 mb-3">
        <label class="form-label fw-bold">Upload CBT Questions (Excel)</label>
        <input
            type="file"
            name="excel_file"
            class="form-control"
            accept=".xlsx,.xls"
            required>

        <small class="text-muted">
            Upload only Excel (.xlsx or .xls) files.
        </small>
    </div>

    <!-- Submit Button -->
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-upload"></i> Upload CBT Exam
        </button>
    </div>

</div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </main>
        @push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const addBtn = document.getElementById('addRow');
    const rowsContainer = document.getElementById('rows');

    if (!addBtn || !rowsContainer) {
        console.log('Missing elements');
        return;
    }

    addBtn.addEventListener('click', function () {

        let firstRow = document.querySelector('.assignment-row');
        let clone = firstRow.cloneNode(true);

        clone.querySelectorAll('select').forEach(select => {
            select.value = "";
        });

        rowsContainer.appendChild(clone);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeRow')) {
            let rows = document.querySelectorAll('.assignment-row');
            if (rows.length > 1) {
                e.target.closest('.assignment-row').remove();
            }
        }
    });

});
</script>
@endpush
</x-layout>