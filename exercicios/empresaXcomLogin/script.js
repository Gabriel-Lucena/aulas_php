const addNewEmployee = document.getElementById("add_new")
const cancelAddEmployee = document.getElementById("cancel")
const sendButton = document.getElementById("send")

const add_modal = document.getElementById("add_container_modal")
const add_modalBackground = document.getElementById("add_bg")

const delete_modal = document.getElementById("delete_container_modal")
const delete_modalBackground = document.getElementById("delete_bg")
const deleteEmployee = document.getElementById("delete")
const cancelDeleteEmployee = document.getElementById("cancelDelete")

addNewEmployee.addEventListener("click", openAddModal)
cancelAddEmployee.addEventListener("click", closeAddModal)
add_modalBackground.addEventListener("click", closeAddModal)

// deleteEmployee.addEventListener("click", openDeleteModal)
// cancelDeleteEmployee.addEventListener("click", closeDeleteModal)
// delete_modalBackground.addEventListener("click", closeDeleteModal)

function openAddModal() {
    add_modal.style.display = "flex"
}

function closeAddModal() {
    add_modal.style.display = "none"
}

function deletar(idFuncionario) {
    let confirmacao = confirm("Deseja deletar o funcionário?")

    if (confirmacao) {
        window.location = "acaoDeletar.php?id=" + idFuncionario
    }
}

function editar(idFuncionario) {

    window.location = "editar.php?id=" + idFuncionario

}