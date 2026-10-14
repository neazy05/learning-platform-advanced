@echo off
setlocal
cd /d "%~dp0"

echo ==============================================
echo Learning Platform - GitHub Publisher
echo ==============================================

where git >nul 2>nul
if errorlevel 1 (
  echo Git was not found. Install Git for Windows from https://git-scm.com/download/win and run this file again.
  pause
  exit /b 1
)

if exist ".env" (
  echo WARNING: A .env file exists in this folder. It must not be uploaded.
  echo Move it outside this folder before continuing.
  pause
  exit /b 1
)

if not exist ".git" git init
if errorlevel 1 goto failed
git branch -M main
if errorlevel 1 goto failed

echo.
echo Review the files Git will stage:
git add .
if errorlevel 1 goto failed
git status --short
echo.
choice /M "Continue and create the initial commit"
if errorlevel 2 goto cancelled

git commit -m "Add learning platform portfolio project"
if errorlevel 1 (
  echo Commit did not complete. If Git asks for your identity, configure user.name and user.email, then rerun this script.
  goto failed
)

echo.
set /p REPO_URL=Paste the HTTPS URL of a NEW EMPTY GitHub repository: 
if "%REPO_URL%"=="" goto failed

git remote get-url origin >nul 2>nul
if errorlevel 1 (
  git remote add origin "%REPO_URL%"
) else (
  git remote set-url origin "%REPO_URL%"
)
if errorlevel 1 goto failed

git push -u origin main
if errorlevel 1 (
  echo.
  echo Push failed. Do not use --force. Check whether the GitHub repository is truly empty.
  goto failed
)

echo.
echo Upload successful. Open the repository in your browser to verify README and folders.
pause
exit /b 0

:cancelled
echo Cancelled before commit. No upload was attempted.
pause
exit /b 0

:failed
echo.
echo The script stopped. Copy the error message and send it to ChatGPT for help.
pause
exit /b 1
