

<x-layout title="Search Students" heading="Students">
            <div class="content">
                <div class="box">
                    <h2>Search Students</h2>
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
                    <form action="{{ route('allcourses') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">Search with any related Words</label>

                            <input 
                                class="form-control @error('uploadstudent') is-invalid @enderror"
                                type="text"
                                name="search"
                                id="search"
                                value="{{ request('search') }}"
                                placeholder="Search student..."
                            >

                            @error('uploadstudent')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div class="box">
                    <h2>List of Students</h2>
                    <br>
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Action</th>
                        </tr>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->coursecode }}</td>
                                    <td>{{ $course->coursetitle }}</td>
                                    <td><a href="" class="btn btn-success">Details</a></td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </main>
</x-layout>