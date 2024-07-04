import './bootstrap';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-button');
    const succes=document.querySelector('#success');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest('.delete-form');
            const projectItem = this.closest('.project-item');
            
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        projectItem.classList.add('fade-out');
                        form.submit();
                    }, 500); // Tiempo de la animación
                }
            });
        });
    });
    if(succes){
        setTimeout(() => {
            succes.classList.add('fade-out');
            succes.remove();
        }, 2000); // Tiempo de la animación
    }
});