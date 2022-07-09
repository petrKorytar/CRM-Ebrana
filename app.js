
const { createApp } = Vue

createApp({
  data() {
    return {
      allData:[],
      myModel:false,
      actionButton:"Vložit",
      dynamicTitle:"Přidat uživatele",
      searchName:"",
      searchLastName:"",
      searchJob:"",
      searchId:"",
      noData:false,
      searchedArray:[],
    }
  },
  
  methods: {
  //  Save all users from database to this.allData.
    async fetchAllData(){

       await  axios.post('/CRM-Ebrana/Controllers/controller.php',{action:'fetchall'})
            .then((response)=>{
                this.allData = response.data
                this.searchedArray= response.data
            })
            .catch((error)=>{
                console.log(error)
            })
    },

    // Filters by id or first name or last name or job
    filteredList(search){

         if(search=='name'){
            this.searchedArray = this.allData.filter((searched)=>searched.firstName.toLowerCase().includes(this.searchName.toLowerCase()))
         }
        else if(search=='lastName'){
            this.searchedArray = this.allData.filter((searched)=>searched.lastName.toLowerCase().includes(this.searchLastName.toLowerCase()))
         }
        else if(search=='job'){
            this.searchedArray = this.allData.filter((searched)=>String(searched.job).includes(this.searchJob))
         }
         else if(search=='id'){
            this.searchedArray = this.allData.filter((searched)=>String(searched.id).includes(this.searchId))
         }
        
    },

    // Open table for add or edit user.
    openModel(){
        this.firstName=""
        this.lastName=""
        this.job=""
        this.actionButton = "Vložit"
        this.dynamicTitle = "Přidat uživatele"
        this.myModel = true
    },
 
   async submitData(){
        if(this.firstName !=""&& this.lastName!="" && this.job!=""){

            // Insert new user.
                if(this.actionButton=="Vložit"){

                  await  axios.post('/CRM-Ebrana/Controllers/controller.php',{
                        action:'insert',
                        firstName:this.firstName,
                        lastName:this.lastName,
                        job:this.job

                    }).then((response)=>{
                        this.myModel = false
                        this.fetchAllData()
                        this.firstName=""
                        this.lastName=""
                        this.job=""
                    })
                }

            // Edit exist user.
                if(this.actionButton == "Upravit"){
                  await axios.post('/CRM-Ebrana/Controllers/controller.php',{
                        action:'update',
                        firstName: this.firstName,
                        lastName: this.lastName,
                        job: this.job,
                        hiddenId: this.hiddenId

                    }).then((response)=>{
                        this.myModel = false
                        this.fetchAllData()
                        this.firstName=""
                        this.lastName=""
                        this.job=""
                        this.hiddenId = ""
                    })
                }
        }
        else{
            alert("Něco jsi nezadal!")
        }
    },

    //It captures the data of a single user.
    fetchData(id){
        axios.post('/CRM-Ebrana/Controllers/controller.php',{
            action:'fetchSingle',
            id:id

        }).then((response)=>{
            this.firstName = response.data.firstName
            this.lastName = response.data.lastName
            this.job = response.data.job
            this.hiddenId = response.data.id
            this.myModel = true
            this.actionButton = 'Upravit'
            this.dynamicTitle = 'Upravit data'
        })
    },
    // Delete user by id.
    deleteData(id){
        if(confirm("Opravdu chceš tento záznam smazat?")){
            axios.post('/CRM-Ebrana/Controllers/controller.php',{
                action:'delete',
                id:id

            }).then((response)=>{
                this.fetchAllData()
            })
        }
    },
  },
  created() {
    this.fetchAllData(); 
  },
}).mount('#myApp')
