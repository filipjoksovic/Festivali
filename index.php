<html lang="en">
<!-- Faggot -->

<head>
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css" type="text/css">
</head>

<body>

    <div id="main" class="container-fluid">
        <nav id="navSelect" class="navbar navbar-expand-lg navbar-light bg-light">
            <div id="select" class="container row mx-auto d-flex justify-content-center">
                <div class="col-md mr-3">
                    <label for="godina">Godina</label>
                    <select name="godina" id="godina" class="custom-select custom-select-sm">
                        <option disabled selected>Festival</option>
                    </select>
                </div>
                <div class="col-md mr-3">
                    <label for="festival">Festival</label>
                    <select name="festival" id="festival" class="custom-select custom-select-sm">
                        <option disabled selected>Festival</option>
                    </select>
                </div>
                <div class="col-md mr-3">
                    <label for="Dan">Dan</label>

                    <select name="dan" id="dan" class="custom-select custom-select-sm">
                        <option disabled selected>Dan</option>
                    </select>
                </div>
                <div class = "col-md mr-3" id = "insertBtn">
                    <button class = "btn btn-info" >Novi korisnik</button>
                </div>
            </div>
        </nav>
         <nav id="navInsert" class="navbar navbar-expand-lg navbar-light bg-light" style = "display:none">
            <div id="insert" class="container">
                <div class="col-md mr-3">
                    <label>Godina</label><br>
                    <select class="custom-select custom-select-sm"></select>
                </div>
                <div class="col-md mr-3">
                    <label>Festival</label><br>

                    <select class="custom-select custom-select-sm"></select>
                </div>
                <div class="col-md mr-3">
                    <label>Dan</label><br>

                    <select class="custom-select custom-select-sm"></select>
                </div>
                <div class="col-md mr-3">
                    <label>Posetilac</label><br>

                    <select class="custom-select custom-select-sm"></select>
                </div>
                <div class="col-md mr-3">
                    <label>Cena</label><br>

                    <input class="form-control form-control-sm"></select>
                </div>
        </nav>

        <div class="container">
            <div class="row d-flex p-3">
                <div class="col-md">
                    <form class="form-inline">
                        <input type="text" placeholder="Pretraga" class="form-control mr-3" id="search"></input>
                        <button class="btn btn-outline-success my-2 my-sm-0" id="search-btn">Pretrazi</button>
                    </form>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-md" id="namesData">
                    <p>Podaci o korisnicima</p>

                    <table class="table table-bordered" id="names">
                        <thead>
                            <tr>
                                <th scope="col" class="name">#</th>
                                <th scope="col">Ime</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <p id="spent-most">Najvise potrosio:</p>
                </div>
                <div class="col-md container" id="festivalData">
                    <p id="visitor">Poseceni festivali za: </p>
                    <table class="table table-bordered" id="festivals">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"> </script>
</body>

</html>