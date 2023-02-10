# Simple IoT Update Server

This is a simple PHP-based web server code I host on my home Apache server. Various IoT devices (Arduino, ESPs, etc.) connect to it to upload their logs and download new versions of firmware.

## Installation

Just copy it into the root (or wherever) of your Apache server.

## Usage

Check the latest available version for a specified device
```
GET /version.php?device={device name}
```
Download firmware for a specified device
```
GET /firmware.php?device={device name}
```
Upload a text file (usually logs) from a specified device into /uploads folder
```
POST /upload.php?device={device name}
```
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
