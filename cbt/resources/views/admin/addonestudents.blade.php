

<x-layout title="Add Students" heading="Students">
            <div class="content">
                <div class="box">
                    <h2>Add Students</h2>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('savestudents') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name_of_applicant" class="form-label">Student Name</label>
                                <input 
                                    class="form-control @error('uploadstudent') is-invalid @enderror"
                                    type="text"
                                    id="name_of_applicant"
                                    name="name_of_applicant"
                                >
                                @error('name_of_applicant')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="matric_no" class="form-label">Matric Number</label>
                                <input 
                                    class="form-control @error('uploadstudent') is-invalid @enderror"
                                    type="text"
                                    id="matric_no"
                                    name="matric_no"
                                >
                                @error('matric_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="award_in_view" class="form-label">Award in View</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="award_in_view" name="award_in_view">
                                <option value="">Select Award in View</option>
                                @foreach ($awards as $award_in_view)
                                    <option value="{{ $award_in_view }}"
                                        {{ old('award_in_view') == $award_in_view ? 'selected' : '' }}>
                                        {{ $award_in_view }}
                                    </option>
                                @endforeach
                            </select>
                            @error('award_in_view')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="level" name="level">
                                <option value="">Select Level</option>
                                <option value="I" {{ old('level') == 'I' ? 'selected' : '' }}>I</option>
                                <option value="II" {{ old('level') == 'II' ? 'selected' : '' }}>II</option>
                            </select>
                            @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="department" name="department">
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department }}" {{ old('department') == $department ? 'selected' : '' }}>
                                        {{ $department }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="course_name" name="course_name">
                                <option value="">Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course }}" {{ old('course_name') == $department ? 'selected' : '' }}>
                                        {{ $course }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @php
                            $currentYear = date('Y');
                            $session1=($currentYear).'/'.($currentYear+1);
                            $session0=($currentYear-1).'/'.($currentYear);
                            $session_1=($currentYear-2).'/'.($currentYear-1);
                            $session_2=($currentYear-3).'/'.($currentYear-2);
                            
                        @endphp
                        <div class="mb-3">
                            <label for="academic_session" class="form-label">Session</label>
                            <select class="form-select @error('level') is-invalid @enderror" id="academic_session" name="academic_session">
                                <option value="{{ $session1 }}" {{ old('academic_session') ==  $session0 ? 'selected' : '' }} >{{ $session1 }}</option>
                                <option value="{{ $session0 }}" {{ old('academic_session', $session1) == $session0 ? 'selected' : '' }} selected>{{ $session0 }}</option>
                                <option value="{{ $session_1 }}" {{ old('academic_session') ==  $session_1 ? 'selected' : '' }} >{{ $session_1 }}</option>
                                <option value="{{ $session_2 }}" {{ old('academic_session') ==  $session_2 ? 'selected' : '' }} >{{ $session_2 }}</option>
                            </select>
                            @error('academic_session')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </main>
</x-layout>