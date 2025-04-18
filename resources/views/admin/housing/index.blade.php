@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Housing Rules</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SR</th>
                        <th>Center</th>
                        <th>Front</th>
                        <th>Back</th>
                        <th>Left</th>
                        <th>Right</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>@php
                            if($row->center=='w'){
                            echo'white';
                            }
                            elseif($row->center=='p'){
                                echo'p52';
                            }
                            elseif($row->center=='e'){
                                echo'Empty House';
                            }
                            elseif($row->center=='n'){
                                echo'No House';
                            }
                            elseif($row->center=='s'){
                                echo'No Signup';
                            }
                            @endphp
                            </td>
                            <td>
                            @php
                            if($row->front=='w'){
                            echo'white';
                            }
                            elseif($row->front=='p'){
                                echo'p52';
                            }
                            elseif($row->front=='e'){
                                echo'Empty House';
                            }
                            elseif($row->front=='n'){
                                echo'No House';
                            }
                            elseif($row->front=='s'){
                                echo'No Signup';
                            }
                            @endphp
                        </td>
                            <td>
                            @php
                            if($row->back=='w'){
                            echo'white';
                            }
                            elseif($row->back=='p'){
                                echo'p52';
                            }
                            elseif($row->back=='e'){
                                echo'Empty House';
                            }
                            elseif($row->back=='n'){
                                echo'No House';
                            }
                            elseif($row->back=='s'){
                                echo'No Signup';
                            }
                            @endphp
                        </td>
                            <td>
                            @php
                            if($row->left=='w'){
                            echo'white';
                            }
                            elseif($row->left=='p'){
                                echo'p52';
                            }
                            elseif($row->left=='e'){
                                echo'Empty House';
                            }
                            elseif($row->left=='n'){
                                echo'No House';
                            }
                            elseif($row->left=='s'){
                                echo'No Signup';
                            }
                            @endphp
                        </td>
                            <td>
                            @php
                            if($row->right=='w'){
                            echo'white';
                            }
                            elseif($row->right=='p'){
                                echo'p52';
                            }
                            elseif($row->right=='e'){
                                echo'Empty House';
                            }
                            elseif($row->right=='n'){
                                echo'No House';
                            }
                            elseif($row->right=='s'){
                                echo'No Signup';
                            }
                            @endphp
                        </td>
                            <td class="editable-cell" data-id="{{ $row->id }}">
                            <div class="score" contenteditable="false">{{ $row->score }}</div>
                            <i class="fas fa-pencil-alt edit-icon" onclick="makeEditable(this)"></i>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function makeEditable(icon) {
            let cell = icon.closest('.editable-cell');
            let scoreSpan = cell.querySelector('.score');

            scoreSpan.contentEditable = true;
            scoreSpan.focus();
            icon.classList.remove('fa-pencil-alt');
            icon.classList.add('fa-check');
            icon.setAttribute('onclick', 'saveScore(this)');
        }

        function saveScore(icon) {
            let cell = icon.closest('.editable-cell');
            let scoreSpan = cell.querySelector('.score');
            let id = cell.getAttribute('data-id');
            let newScore = scoreSpan.innerText;

            scoreSpan.contentEditable = false;
            icon.classList.remove('fa-check');
            icon.classList.add('fa-pencil-alt');
            icon.setAttribute('onclick', 'makeEditable(this)');
            let app_url=@json($app_url);
            fetch(`https://ginicoe.com/admin/housing/update_score`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: id,
                    score: newScore
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Score updated successfully!');
                } else {
                    alert('Failed to update score.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the score.');
            });
        }
    </script>
@endsection
