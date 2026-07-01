<x-layout title="Add Departmant to Course" heading="Course Departmant">
    <div class="content"> 
        <div class="box"> 
            <h2>Add Departmant to Course</h2> 
            @if(session('success')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {
                { session('success') }} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            </div> 
            @endif @if(session('error')) 
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                {{ session('error') }} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            </div> 
            @endif 
            <form action="{{ route('courseassignments') }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                <!-- Select Course --> 
                <div class="mb-3"> 
                    <label class="form-label">Course</label> 
                    <select name="course_id" class="form-control" required> 
                        <option value="">-- Select Course --</option> 
                        @foreach($courses as $course) 
                        <option value="{{ $course->id }}"> 
                            {{ $course->coursetitle }} ({{ $course->coursecode }}) 
                        </option> 
                        @endforeach 
                    </select> 
                </div> 
                <hr> 
                <div id="rows"> 
                    <div class="row mb-3 assignment-row"> 
                        <div class="col-md-12"> 
                            <label>Department</label> 
                            <select name="department[]" class="form-control"> 
                                <option value="">Select Department</option> 
                                @foreach($departments as $dept) 
                                <option value="{{ $dept->department }}"> 
                                    {{ $dept->department }} 
                                </option> @endforeach 
                            </select> 
                        </div> 
                        <div class="col-md-12"> 
                            <label>Course Name</label> 
                            <select name="course_name[]" class="form-control"> 
                                <option value="">Select Course</option> 
                                @foreach($courseNames as $courseName) 
                                <option value="{{ $courseName->course_name }}"> {{ $courseName->course_name }} </option> 
                                @endforeach 
                            </select> 
                        </div> 
                        <div class="col-md-6"> 
                            <label>Award</label> 
                            <select name="award_in_view[]" class="form-control"> 
                                <option value="">Select Class</option> 
                                @foreach($awards as $award) 
                                <option value="{{ $award->award_in_view }}"> {{ $award->award_in_view }} </option> 
                                @endforeach 
                            </select> 
                        </div> 
                        <div class="col-md-3"> 
                            <label>Level</label> 
                            <select name="level[]" class="form-control"> 
                                <option value="">Select Level</option> 
                                @foreach($levels as $level) 
                                <option value="{{ $level->level }}"> {{ $level->level }} </option> 
                                @endforeach 
                            </select> 
                        </div> 
                        <div class="col-md-2 d-flex align-items-end"> 
                            <button type="button" class="btn btn-danger removeRow"> Remove </button> 
                        </div> 
                    </div> 
                </div> 
                <div class="mb-3"> 
                    <button type="button" id="addRow" class="btn btn-primary"> Add Another Set </button> 
                </div> <div class="d-grid"> 
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
                console.log('Missing elements'); return; 
            } 
            addBtn.addEventListener('click', function () { 
                let firstRow = document.querySelector('.assignment-row'); 
                let clone = firstRow.cloneNode(true); 
                clone.querySelectorAll('select').forEach(select => { select.value = ""; }); 
                rowsContainer.appendChild(clone); }); 
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