// main.js

// Modules to control application life and create native browser window
const { app, ipcMain, globalShortcut, remote, BrowserWindow } = require('electron')
const path = require('path')
const $ = require('jquery')
const electron = require('electron')

// Enable live reload for all the files inside your project directory
require('electron-reload')(__dirname);

function createWindow () {
  // Create the browser window.
  mainWindow = new BrowserWindow({
    icon: 'build/mediadrake_icon.ico',
    frame: false,
    backgroundColor: '#111111',
    transparent: false,
    movable: false,
    minimizable: false,
    maximizable: false,
    resizable: false,
    fullscreen: true,
    center: true,
    alwaysOnTop: true,
    webPreferences: {
      nodeIntegration: true,
      contextIsolation: false,
      // enableRemoteModule: true,
      preload: path.join(__dirname, 'resources/js/preload.js')
    }
  })

  // and load the index.html of the app.
  mainWindow.loadFile('index.html')

  // Open the DevTools.
  // mainWindow.webContents.openDevTools()
}

app.whenReady().then(() => {
  createWindow()
  app.on('activate', function () {
    if (BrowserWindow.getAllWindows().length === 0) createWindow()
  })
})

app.on('window-all-closed', function () {
  if (process.platform !== 'darwin') app.quit()
})








// KEY-EVENTS
app.whenReady().then(() => {

  globalShortcut.register('F1', () => {
    app.quit()
  });

})
