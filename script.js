class Script{
    constructor() {
         this.nameInput = document.getElementById('name');
         this.idInput = document.getElementById('id');
        this.disabledInputName();
        this.checkData();
    }
    disabledInputName(){
        if(document.getElementById("table-title").textContent === "Таблица: log_entries"){
            this.nameInput.setAttribute('disabled', 'disabled');
            this.nameInput.previousElementSibling.classList.add('filter__input_notactive');
        }
    }
    checkData(){
        document.getElementById('submit').addEventListener("click", (event) =>{
            if(this.nameInput.value === "" && this.idInput.value === ""){
                alert("Ошибка, поля не заполнены")
                event.preventDefault();
                return;
            }
            if(this.idInput.value !== ""){
                if(!Number.isInteger(+this.idInput.value) || +this.idInput.value < 0){
                    alert("Ошибка.\nId должно быть целым, положительным числом")
                    event.preventDefault();
                }
            }
        })
    }
}

document.addEventListener("DOMContentLoaded", () => new Script())
