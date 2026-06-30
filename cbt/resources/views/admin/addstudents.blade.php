

<x-layout title="Add Students" heading="Students">
            <div class="content">
                <div class="box">
                    <h2>Add Students</h2>
                    <form action="{{ route('savestudents') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">Choose File</label>
                            <input 
                                class="form-control" type="file" id="fileUpload" name="uploadstudent" 
                                accept=".csv, .xls, .xlsx, text/csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <input 
                                class="form-control" type="text" id="level" name="level"
                            >
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save</button>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>john@mail.com</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>Sarah Smith</td>
                            <td>sarah@mail.com</td>
                            <td>Pending</td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
</x-layout>