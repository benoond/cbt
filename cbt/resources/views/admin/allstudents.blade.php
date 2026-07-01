

<x-layout title="All Students" heading="All Students">
            <div class="content">
                <div class="box">
                    <h2>List of Students</h2>
                    <br>
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Matric No</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>More</th>
                        </tr>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name_of_applicant }}</td>
                            <td>{{ $student->matric_no }}</td>
                            <td>{{ $student->department }}</td>
                            <td>{{ $student->award_in_view." ".$student->level }}</td>
                            <td><a href="" class="btn btn-success">Details</a></td>
                        </tr>
                    @endforeach
                    </table>
                    <div class="mt-3">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </main>
</x-layout>