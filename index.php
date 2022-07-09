<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Simpy CRM</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="container" id="myApp">
        <h1  align="center">Redakční systém pro správu uživatelů</h1>
        <br/>

        <!----------------------- Searching by ID,name,last name or job. --------------------->
        <div>
            <h2>Vyhledávání</h2>
            <table>
                <tr>
                    <td>
                        <input v-model="searchId" @keyup="filteredList('id')" id="id" type="text" class="form-control input-sm" placeholder="Id"/>
                    </td>
                    <td>
                        <input v-model="searchName" @keyup="filteredList('name')" id="name" type="text" class="form-control input-sm" placeholder="Jméno"/>
                    </td>
                    <td>
                        <input v-model="searchLastName" @keyup="filteredList('lastName')" id="lastName" type="text" class="form-control input-sm" placeholder="Příjmení"/>
                    </td>
                    <td>
                        <input v-model="searchJob" @keyup="filteredList('job')" id="job" type="text" class="form-control input-sm" placeholder="Práce"/>
                    </td>
                </tr>
            </table>
        </div>
        <br/>
        <div class="panel panel-default">
            <div class="panel heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Uživatelé</h3>
                    </div>

        <!-------------------------- Add new user button--------------------------  -->
                    <div class="col-md-6" align="right">
                        <input @click="openModel"  value="Přidat" type="button" class="btn btn-success btn-xs" >
                    </div>
                </div>
            </div>

        <!--------------------- The table with description------------------------  -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Jméno</th>
                            <th>Příjmení</th>
                            <th>Číslo pracovní pozice
                                    <select name="chosenJob" aria-placeholder="Vyber svůj obor zaměstnání">
                                        <option value="">Obory zaměstnání</option>
                                        <option value="0">0-Zaměstnanci v ozbrojených silách</option>
                                        <option value="1">1-Zákonodárci a řídící pracovníci</option>
                                        <option value="2">2-Specialisté</option>
                                        <option value="3">3-Techničtí a odborní pracovníci</option>
                                        <option value="4">4-Úředníci</option>
                                        <option value="5">5-Pracovníci ve službách a prodeji</option>
                                        <option value="6">6-Kvalifikovaní pracovníci v zemědělství, lesnictní a rybářství</option>
                                        <option value="7">7-Řemeslníci a opraváři</option>
                                        <option value="8">8-Obsluha strojů a zařízení,montéři</option>
                                        <option value="9">9-Pomocní a nekvalifikovaní pracovníci</option>
                                    </select>
                            </th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

        <!-- ----------------View of users------------------------  -->
                            <tr v-for="(row,index) in searchedArray" :key="index">
                                        <td>{{row.id}}</td>
                                        <td>{{row.firstName}}</td>
                                        <td>{{row.lastName}}</td>
                                        <td>{{row.job}}</td>
                                        <td>
                                            <button @click="fetchData(row.id)" type="button" name="edit" class="btn btn-primary btn-xs edit">
                                                Upravit
                                            </button>
                                        </td>
                                        <td>
                                            <button @click="deleteData(row.id)" type="button" name="delete" class="btn btn-danger btn-xs Delete">
                                                Smazat
                                            </button>
                                        </td>
                            </tr>
                            <tr v-if="noData">
                                <td colspan="all" align="center">Nenalezena žádná data</td>
                            </tr>                       
                    </table>
                </div>
            </div>
        </div>

        <!--------------- The table for add new user. -------------------- -->
        <div v-if="myModel">
            <transition name="model">
                <div class="modal-mask">
                    <div class="modal-wrapper ">
                        <div class="modal-dialog d-flex justify-content-center">
                            <div class="modal-content w-75 bg-light p-4 rounded ">
                                <div class="modal-header">
                                <h4 class="modal-title">{{dynamicTitle}}</h4>
                                    <button @click="myModel=false" type="button" class="close rounded">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body p-20">
                                    <div class="form-group">
                                        <label>Jméno</label>
                                        <input v-model="firstName" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Příjmení</label>
                                        <input v-model="lastName" type="text" class="form-control">
                                    </div>
                                    <select v-model="job" class="mt-2 rounded">
                                        <option disabled value="">Vyber svůj obor zaměstnání</option>
                                        <option value="0">0-Zaměstnanci v ozbrojených silách</option>
                                        <option value="1">1-Zákonodárci a řídící pracovníci</option>
                                        <option value="2">2-Specialisté</option>
                                        <option value="3">3-Techničtí a odborní pracovníci</option>
                                        <option value="4">4-Úředníci</option>
                                        <option value="5">5-Pracovníci ve službách a prodeji</option>
                                        <option value="6">6-Kvalifikovaní pracovníci v zemědělství, lesnictní a rybářství</option>
                                        <option value="7">7-Řemeslníci a opraváři</option>
                                        <option value="8">8-Obsluha strojů a zařízení,montéři</option>
                                        <option value="9">9-Pomocní a nekvalifikovaní pracovníci</option>
                                    </select>
                                    <div align="center" class="mt-2">
                                        <input v-model="hiddenId" type="hidden" >
                                        <input type="button" class="btn btn-success btn-xs" v-model="actionButton" @click="submitData">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </transition>
        </div>
    </div>

    <script src="./app.js"></script>
</body>
</html>

