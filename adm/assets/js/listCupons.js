const masks = {
  porcentagem(value) {
        return value.replace(/\D/g, "")
            .replace(/([0-9]{2})$/g, ".$1");
  }
};

document.querySelectorAll("input").forEach(($input) => {
  const field = $input.dataset.js;
  $input.addEventListener(
    "input",
    (e) => {
      e.target.value = masks[field](e.target.value);
    },
    false
  );
});
