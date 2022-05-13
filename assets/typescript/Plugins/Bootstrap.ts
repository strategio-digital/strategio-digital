/**
 * Copyright (c) 2021 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

import {Button, Modal, Tooltip} from "bootstrap";

export default () => {
    Array.from(document.querySelectorAll('.btn')).forEach(node => new Button(node));
    Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]')).forEach(node => new Tooltip(node));
    Array.from(document.querySelectorAll('.modal')).map(element => new Modal(element));
}