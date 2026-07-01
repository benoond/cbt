

<x-layout title="Upload Students" heading="Students">
            <div class="content">
                <div class="box">
                    <h2>Upload Students</h2>
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
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">Choose File</label>

                            <input 
                                class="form-control @error('uploadstudent') is-invalid @enderror"
                                type="file"
                                id="fileUpload"
                                name="uploadstudent"
                                accept=".csv, .xls, .xlsx"
                            >

                            @error('uploadstudent')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <input class="form-control" type="text" id="level" name="level" value="{{ old('level') }}" placeholder="I or II">
                        </div> -->
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </main>
</x-layout>