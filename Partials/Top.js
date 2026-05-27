const CursorModule = (() => {
  const dot = document.getElementById("cur-dot");
  if (!dot) return { init: () => {} };

  let dX = 0,
    dY = 0,
    rX = 0,
    rY = 0;

  const originalSrc = dot.src;
  // optional default hover image (place file next to original or set data-hover on the img)
  const defaultHoverSrc = dot.dataset.hover || originalSrc.replace('.gif', '_hover.gif');
  // default click image (optional)
  const defaultClickSrc = dot.dataset.click || originalSrc.replace('.gif', '_click.gif');

  const lerp = (a, b, t) => a + (b - a) * t;
  const tick = () => {
    rX = lerp(rX, dX, 0.50);
    rY = lerp(rY, dY, 0.50);
    dot.style.left = rX + "px";
    dot.style.top = rY + "px";
    requestAnimationFrame(tick);
  };
  const init = () => {
    document.addEventListener("mousemove", (e) => {
      dX = e.clientX;
      dY = e.clientY;
    });

    // click animation: mousedown/mouseup (and touch)
    document.addEventListener("mousedown", (e) => {
      document.body.classList.add("cursor-click");
      const el = e.target.closest('a,button,input,textarea,select,[role="button"]');
      const clickSrc = (el && (el.dataset.cursor || el.dataset.click)) || defaultClickSrc;
      if (clickSrc) dot.src = clickSrc;
    });
    document.addEventListener("mouseup", () => {
      document.body.classList.remove("cursor-click");
      // small delay to allow click image to show, then restore hover/original
      setTimeout(() => {
        if (document.body.classList.contains("cursor-hover")) {
          dot.src = dot.dataset.cursor || dot.dataset.hover || defaultHoverSrc;
        } else {
          dot.src = originalSrc;
        }
      }, 80);
    });
    document.addEventListener("touchstart", (e) => {
      document.body.classList.add("cursor-click");
      const el = e.target.closest('a,button,input,textarea,select,[role="button"]');
      const clickSrc = (el && (el.dataset.cursor || el.dataset.click)) || defaultClickSrc;
      if (clickSrc) dot.src = clickSrc;
    }, {passive: true});
    document.addEventListener("touchend", () => {
      document.body.classList.remove("cursor-click");
      setTimeout(() => {
        if (document.body.classList.contains("cursor-hover")) {
          dot.src = dot.dataset.cursor || dot.dataset.hover || defaultHoverSrc;
        } else {
          dot.src = originalSrc;
        }
      }, 80);
    });

    document
      .querySelectorAll('a,button,input,textarea,select,[role="button"]')
      .forEach((el) => {
        el.addEventListener("mouseenter", () => {
          document.body.classList.add("cursor-hover");
          // if element defines a custom cursor image: data-cursor="path/to/img.gif"
          const hoverSrc = el.dataset.cursor || el.dataset.hover || defaultHoverSrc;
          if (hoverSrc) dot.src = hoverSrc;
        });
        el.addEventListener("mouseleave", () => {
          document.body.classList.remove("cursor-hover");
          dot.src = originalSrc;
        });
      });
    tick();
  };
  return { init };
})();
CursorModule.init();