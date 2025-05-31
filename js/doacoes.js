document.getElementById('btnNovaDoacao').addEventListener('click', function () {
    Swal.fire({
        title: 'Nova Doação',
        html:
            `<input type="text" id="doador" class="swal2-input" placeholder="Nome do Doador">
             <input type="text" id="valores" class="swal2-input" placeholder="Valor">
             <input type="text" id="destinado" class="swal2-input" placeholder="Destinado para">`,
        confirmButtonText: 'Salvar',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            const doador = document.getElementById('doador').value;
            const valores = document.getElementById('valores').value;
            const destinado = document.getElementById('destinado').value;

            if (!doador || !valores || !destinado) {
                Swal.showValidationMessage('Preencha todos os campos');
                return false;
            }

            return { doador, valores, destinado };
        }
    }).then((result) => {
        if (result.isConfirmed && result.value) {
            $.post('salvar_doacao.php', result.value, function (res) {
                if (res.success) {
                    Swal.fire('Sucesso!', res.message, 'success').then(() => {
                        location.reload(); 
                    });
                } else {
                    Swal.fire('Erro!', res.message, 'error');
                }
            }, 'json');
        }
    });
});