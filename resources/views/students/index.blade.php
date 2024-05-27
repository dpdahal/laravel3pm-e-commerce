<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<blockquote>
    <h1>Student Record</h1>
    <form action="">
        <label for="name">Name</label> <br>
        <input type="text" name="name" id="name" required> <br>
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email" required> <br>
        <label for="address">Address</label> <br>
        <input type="text" name="address" id="address" required> <br>
        <button onclick="addStudent(event)">Submit</button>
    </form>
    <hr>
    <h2>Student List</h2>
    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody id="student_list">

        </tbody>
    </table>
</blockquote>

<script>
    let token = "{{ csrf_token() }}";
    let sendUrl = "{{ route('add-student') }}";
    console.log(sendUrl);
    function addStudent(e) {
        e.preventDefault();
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let address = document.getElementById('address').value;
        let sendData = {
            name: name,
            email: email,
            address: address
        }

        fetch(sendUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify(sendData)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                getStudent();
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }

    function getStudent(){
        fetch("{{ route('get-student') }}", {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            }
        })
            .then(response => response.json())
            .then(data => {
              let outPut="";
                data.forEach((student)=>{
                    outPut += `<tr>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.address}</td>
                                    <td><button onclick="deleteStudent(${student.id})">Delete</button></td>
                                </tr>`;
                });
                document.getElementById('student_list').innerHTML = outPut;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    getStudent();

    function deleteStudent(id){
        fetch("{{ route('delete-student') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({id:id})
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                getStudent();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

</body>
</html>
