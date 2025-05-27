function abrirModalAdicionar() {
  document.getElementById("form-produto").reset();
  document.getElementById("acao").value = "adicionar";
  Swal.fire({
    title: "Adicionar Produto",
    html: document.getElementById("modal-produto").innerHTML,
    showCancelButton: true,
    confirmButtonText: "Salvar",
    cancelButtonText: "Cancelar",
    preConfirm: () => {
      const form = Swal.getPopup().querySelector("#form-produto");
      const formData = new FormData(form);

      if (!formData.get("nome") || !formData.get("preco")) {
        Swal.showValidationMessage("Preencha todos os campos");
        return false;
      }

      return fetch("", {
        method: "POST",
        body: formData,
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error(response.statusText);
          }
          return response.text();
        })
        .catch((error) => {
          Swal.showValidationMessage(`Erro: ${error}`);
        });
    },
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Sucesso!", "Produto adicionado.", "success").then(() =>
        location.reload()
      );
    }
  });
}

function abrirModalEditar(id, nome, preco, imagem) {
  document.getElementById("acao").value = "editar";
  document.getElementById("id_produto").value = id;
  document.getElementById("nome_produto").value = nome;
  document.getElementById("preco_produto").value = preco;
  document.getElementById("imagem_atual").value = imagem;

  Swal.fire({
    title: "Editar Produto",
    html: document.getElementById("modal-produto").innerHTML,
    showCancelButton: true,
    confirmButtonText: "Salvar",
    cancelButtonText: "Cancelar",
    didOpen: () => {
      Swal.getPopup().querySelector("#acao").value = "editar";
      Swal.getPopup().querySelector("#id_produto").value = id;
      Swal.getPopup().querySelector("#nome_produto").value = nome;
      Swal.getPopup().querySelector("#preco_produto").value = preco;
      Swal.getPopup().querySelector("#imagem_atual").value = imagem;
    },
    preConfirm: () => {
      const form = Swal.getPopup().querySelector("#form-produto");
      const formData = new FormData(form);

      if (!formData.get("nome") || !formData.get("preco")) {
        Swal.showValidationMessage("Preencha todos os campos");
        return false;
      }

      return fetch("", {
        method: "POST",
        body: formData,
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error(response.statusText);
          }
          return response.text();
        })
        .catch((error) => {
          Swal.showValidationMessage(`Erro: ${error}`);
        });
    },
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Sucesso!", "Produto editado.", "success").then(() =>
        location.reload()
      );
    }
  });
}

function confirmarExclusao(id) {
  Swal.fire({
    title: "Confirmar exclusão",
    text: "Deseja realmente excluir este produto?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sim, excluir",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const formData = new FormData();
      formData.append("acao", "excluir");
      formData.append("id", id);

      fetch("", {
        method: "POST",
        body: formData,
      })
        .then((response) => {
          if (!response.ok) throw new Error(response.statusText);
          return response.text();
        })
        .then(() => {
          Swal.fire("Excluído!", "Produto removido.", "success").then(() =>
            location.reload()
          );
        })
        .catch((error) => {
          Swal.fire("Erro", error.message, "error");
        });
    }
  });
}
