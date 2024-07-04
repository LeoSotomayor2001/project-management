import './bootstrap';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#delete-project').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Proyecto borrado correctamente",
                        showConfirmButton: false,
                        timer: 1500
                      });
                    form.submit();
                      
                        
                  
                }
            });
        });
    });
});