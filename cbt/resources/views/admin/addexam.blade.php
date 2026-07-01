

<x-layout title="Add Exam" heading="Exam">
            <div class="content">
                <div class="box">
                    <h2>Add Exam</h2>
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </main>
</x-layout>