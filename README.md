
# Notifications

Custom javascript notifications

## Usage/Examples

```javascript
const notifications = new Notifications({
    showDelay: 500,
    transitionSpeed: 1000,
    hideDelay: 5000
});

document.getElementById('button').addEventListener('click', (e) => notifications.addNotification('success', 'You clicked the button.'));
```
## Screenshots

![App Screenshot](https://i.ibb.co/tZ8KPbQ/image.png)
