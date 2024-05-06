<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link grity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="js/script.js" defer></script>
    <title>Our Team</title>

</head>

<body>
    <div id="app">
        <header class="container py-4">
            <h1 class="text-center">Our Team </h1>
        </header>
        <main class="container">
            <div class="row gy-4">
                <div class="col-12 col-md-4 col-lg-3" v-for="(person,index) in team" :key="person.id">
                    <div class="card">
                        <img :src="`./images/${person.userImg}`" class="card-img-top"
                            :alt="`foto: ${person.name} ${person.surname}`">
                        <div class="card-body">
                            <h5 class="card-title">{{person.name}} {{person.surname}}</h5>
                            <div class="card-text  my-2">
                                <span v-if="editIndex !== index" @click="setEdit(index)">{{person.role}}</span>
                                <div v-if="editIndex === index" class="d-flex">
                                    <input type="text" class="form-control" id="name" name="name" v-model="newrole">
                                    <button class="btn btn-success ms-2" @click="updateMember(index)">Aggiorna</button>
                                </div>

                            </div>
                            <a href="#" class="btn btn-primary" @click="deleteMember($event,index)">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-75 mx-auto my-4 bg-body-tertiary p-4">
                <h3>Add a new member</h3>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="newMember.name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" v-model="newMember.surname">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role" v-model="newMember.role">
                </div>
                <div class="mb-3">
                    <label for="userImg" class="form-label">Image</label>
                    <input type="text" class="form-control" id="userImg" name="userImg" v-model="newMember.userImg">
                </div>
                <button type="button" class="btn btn-primary" @click="addMember()">Submit</button>

            </div>
        </main>
        <footer class="text-center py-4">
            Made with &hearts; by Classe#123
        </footer>
    </div>

</body>

</html>