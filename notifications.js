class Notifications {
    constructor({
        showDelay = 500,
        transitionSpeed = 1000,
        hideDelay = 3000
    }) {
        this.notifElements = [
            {
                type: 'success',
                classes: 'notification notification-success',
                id: 'notificationSuccess'
            },
            {
                type: 'warn',
                classes: 'notification notification-warn',
                id: 'notificationWarn'
            },
            {
                type: 'error',
                classes: 'notification notification-error',
                id: 'notificationError'
            }
        ]

        this.showDelay = showDelay;
        this.transitionSpeed = transitionSpeed;
        this.hideDelay = hideDelay;
        this.generateBox();
    }

    generateBox = () => {
        this.notificationBox = document.createElement('div');
        this.notificationBox.classList.add('notifications');
        this.notificationBox.id = 'notifications';
        document.body.append(this.notificationBox);
    }

    hideNotification = (el) => {
        if(el.timeout) clearTimeout(el.timeout);
        el.style = `transition: transform ${this.transitionSpeed}ms ease-in-out; transform: translateX(0px);`;
        el.addEventListener("transitionend", () => {
            el.remove();
        });
    }

    showNotification = (el) => {
        el.style = `transition: transform ${this.transitionSpeed}ms ease-in-out; transform: translateX(-250px);`;
        el.addEventListener('click', (e) => this.hideNotification(el));
        el.timeout = setTimeout(this.hideNotification, this.hideDelay, el);
    }

    addNotification = (type, text) => {
        if(!text) return;
        const elementType = this.notifElements.find(e => e.type == type);
        if(!elementType) return;
        const el = document.createElement('div');
        el.id = elementType.id;
        el.classList = elementType.classes;
        el.innerHTML = text;
        this.notificationBox.append(el);
        el.timeout = setTimeout(this.showNotification, this.showDelay, el);
    }
}