const mostrarDirecciones = () => {
    document.querySelector('.profile-menu-link').classList.remove('active');

    document.querySelector('.orders-content').classList.remove('mostrar');
    document.querySelector('.orders-content').classList.add('ocultar');

    document.querySelector('.editar-direccion-content').classList.remove('mostrar');
    document.querySelector('.editar-direccion-content').classList.add('ocultar');

    document.querySelector('.add-direccion-content').classList.remove('mostrar');
    document.querySelector('.add-direccion-content').classList.add('ocultar');

    document.querySelector('.direccion-content').classList.add('mostrar');
    document.querySelector('.direccion-content').classList.remove('ocultar');
}

const mostrarCompras = () => {
    document.querySelector('.profile-menu-link').classList.remove('active');
    document.querySelector('.compras-link').classList.add('active');

    document.querySelector('.direccion-content').classList.remove('mostrar');
    document.querySelector('.direccion-content').classList.add('ocultar');

    document.querySelector('.editar-direccion-content').classList.remove('mostrar');
    document.querySelector('.editar-direccion-content').classList.add('ocultar');

    document.querySelector('.add-direccion-content').classList.remove('mostrar');
    document.querySelector('.add-direccion-content').classList.add('ocultar');

    document.querySelector('.orders-content').classList.remove('ocultar');
    document.querySelector('.orders-content').classList.remove('mostrar');
}

const editarDirecciones = () => {
    document.querySelector('.profile-menu-link').classList.remove('active');

    document.querySelector('.orders-content').classList.remove('mostrar');
    document.querySelector('.orders-content').classList.add('ocultar');
    document.querySelector('.direccion-content').classList.remove('mostrar');
    document.querySelector('.direccion-content').classList.add('ocultar');
    document.querySelector('.add-direccion-content').classList.remove('mostrar');
    document.querySelector('.add-direccion-content').classList.add('ocultar');

    document.querySelector('.editar-direccion-content').classList.remove('ocultar');
    document.querySelector('.editar-direccion-content').classList.remove('mostrar');
}


const addDirecciones = () => {
    document.querySelector('.profile-menu-link').classList.remove('active');

    document.querySelector('.orders-content').classList.remove('mostrar');
    document.querySelector('.orders-content').classList.add('ocultar');
    document.querySelector('.direccion-content').classList.remove('mostrar');
    document.querySelector('.direccion-content').classList.add('ocultar');
    document.querySelector('.editar-direccion-content').classList.remove('mostrar');
    document.querySelector('.editar-direccion-content').classList.add('ocultar');
    document.querySelector('.editar-direccion-content').classList.remove('mostrar');
    document.querySelector('.editar-direccion-content').classList.add('ocultar');

    document.querySelector('.add-direccion-content').classList.remove('ocultar');
    document.querySelector('.add-direccion-content').classList.remove('mostrar');
}

Livewire.on('Showdireccion', function () {
    addDirecciones();
});

Livewire.on('Showdirecciones', function () {
    mostrarDirecciones();
});

Livewire.on('showUpdatedDirection', function () {
    editarDirecciones();
});

Livewire.on('saveAddress', function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        icon: 'success',
        title: 'Dirección creada'
    });

    mostrarDirecciones();
});

Livewire.on('editDireccionAlert', function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        icon: 'success',
        title: 'Dirección actualizada'
    });

    mostrarDirecciones();
});

