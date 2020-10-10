<html lang="en">
<!-- Hello -->

<head>
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name=”viewport” content=”width=device-width, initial-scale=1″>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css" type="text/css">
</head>

<body>

    <div id="main" class="container-fluid">
        <nav id="navSelect" class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class = "collapse navbar-collapse" id = "navbarNav">
  <div class = "container">
            <button class = "btn btn-primary my-3 btn-block" id = "showAddUsers">Dodajte kartu</button>
            <!-- d-flex justify-content-center -->
            <div id="addUsers" class="container row mx-auto" style = "display:none">
                <div class="col-xl mr-1">
                    <label for="posetilac">Posetilac</label>
                    <select name="posetilac" id="posetilac" class="custom-select custom-select-sm">
                        <option disabled selected>Ime</option>
                    </select>
                </div>
                <div class="col-xl mr-1">
                    <label for="posGod">Godina</label>
                    <select name="posGod" id="posGod" class="custom-select custom-select-sm">
                        <option disabled selected>Godina</option>
                    </select>
                </div>
                <div class="col-xl mr-1">
                    <label for="posFes">Festival</label>

                    <select name="posFes" id="posFes" class="custom-select custom-select-sm">
                        <option disabled selected>Festival</option>
                    </select>
                </div>
                <div class="col-xl mr-1">
                    <label for="posDan">Dan Posete</label>

                    <select name="posDan" id="posDan" class="custom-select custom-select-sm">
                        <option disabled selected>Dan</option>
                    </select>
                </div>
                <div class="col-xl mr-1">
                        <label for="cena">Cena</label>

                        <input id = "cena" class = "form-control form-control-sm"></input>
                </div>
                <div class = "col-xl mr-1" id = "insertBtn">
                    <button class = "btn btn-info btn-block mt-3" insert = "insertBtn" >Dodaj</button>
                </div>
            </div>
        </div>
        <div class = "container mt-0">
            <button class = "btn btn-primary my-3 btn-block" id = "showSelFest">Odaberite festival</button>
            <!-- d-flex justify-content-center -->
            <div id="selFest" class="container row mx-auto" style = "display:none">
                <div class="col-xl mr-3">
                    <label for="godina">Godina</label>
                    <select name="godina" id="godina" class="custom-select custom-select-sm">
                        <option disabled selected>Festival</option>
                    </select>
                </div>
                <div class="col-xl mr-3">
                    <label for="festival">Festival</label>
                    <select name="festival" id="festival" class="custom-select custom-select-sm">
                        <option disabled selected>Festival</option>
                    </select>
                </div>
                <div class="col-xl mr-3">
                    <label for="Dan">Dan</label>

                    <select name="dan" id="dan" class="custom-select custom-select-sm">
                        <option disabled selected>Dan</option>
                    </select>
                </div>
                <div class = "col-xl mr-3" >
                    <!-- <button class = "btn btn-info" >Dodaj</button> -->
                </div>
            </div>
        </div>
        </div>
        </nav>
        
         <!-- <nav id="navInsert" class="navbar navbar-expand-lg navbar-light bg-light" style = "display:none">
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
        </nav> -->

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
                <div class="col-xl" id="namesData">
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
                <div class="col-xl container" id="festivalData">
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
    <div class = "container-fluid" id = "status">
        <h1 >Status</h1>
    </div>
    <script src="script.js"> </script>
</body>

</html>