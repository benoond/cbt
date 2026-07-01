

<x-layout title="Add Course" heading="Course">
            <div class="content">
                <div class="box">
                    <h2>Add Course</h2>
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
                    <form action="{{ route('savecourses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="coursecode" class="form-label">Course Code</label>

                            <input 
                                class="form-control @error('uploadstudent') is-invalid @enderror"
                                type="text"
                                id="coursecode"
                                name="coursecode"
                            >

                            @error('coursecode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="coursetitle" class="form-label">Course Title</label>

                            <input 
                                class="form-control @error('uploadstudent') is-invalid @enderror"
                                type="text"
                                id="coursetitle"
                                name="coursetitle"
                            >

                            @error('coursetitle')
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