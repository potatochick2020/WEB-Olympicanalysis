window.onload = () => {
  const transition_el = document.querySelector('.transition');

  setTimeout(() => {
    transition_el.classList.remove('is-active');
  }, 300);

  for (let i = 0; i < anchors.length; i++) {
    const anchor = anchors[i];

    anchor.addEventListener('click', e => {
      e.preventDefault();
      let target = e.target.href;

      transition_el.classList.add('is-active');


      setInterval(() => {
        window.location.href = target;
      }, 300);
    })
  }
}