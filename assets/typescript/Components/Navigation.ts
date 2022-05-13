/**
 * Copyright (c) 2021 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

import {Collapse} from "bootstrap";
import OverlayScrollbars from "overlayscrollbars";

export default (scrollbar: OverlayScrollbars) => {
    const navbarEl = document.getElementById('top-navigation') as HTMLDivElement;

    if (!navbarEl) {
        return 0
    }

    const updateNavbarElement = (offset: number) => {
        if (offset >= 50 || window.innerHeight < 1050 && window.innerWidth < 992) {
            navbarEl.classList.add('navigation-small');
        } else {
            navbarEl.classList.remove('navigation-small');
        }
    }

    // update on resize / on scroll
    scrollbar.getElements().viewport.onresize = () => updateNavbarElement(scrollbar.getElements().viewport.scrollTop);
    scrollbar.getElements().viewport.onscroll = () => updateNavbarElement(scrollbar.getElements().viewport.scrollTop);

    // Update on init
    updateNavbarElement(scrollbar.getElements().viewport.scrollTop);

    // Hide navbar on mobile
    const navbarCollapseEl = document.getElementById('navbar-collapse') as HTMLDivElement;
    const navbarCollapse = new Collapse(navbarCollapseEl, {toggle: false}) as Collapse;

    Array.from(navbarCollapseEl.querySelectorAll('.nav-link'))
    .map(element => element.addEventListener('click', () => {
        if (window.innerWidth < 992) {
            navbarCollapse.hide();
        }
    }));

    Array.from(document.querySelectorAll('[data-scroll]'))
    .map(element => element.addEventListener('click', event => {
        event.preventDefault();

        const target = (element as HTMLLinkElement).dataset.scroll as string;
        const anchor = document.querySelector(target);

        if (anchor) {
            const current = scrollbar.getElements().viewport.scrollTop;
            scrollbar.scrollStop().scroll({
                y: anchor.getBoundingClientRect().y + current - 65,
            }, 300);
        }
    }));
}