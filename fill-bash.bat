@echo off
setlocal enabledelayedexpansion

:: Loop to copy files and generate random alphanumeric strings
for /l %%A in (1,1,1000) do (
    :: Generate random alphanumeric string (8 characters long)
    set "randomString="
    for /L %%B in (1,1,8) do (
        set /a "randNum=!random! %% 36"
        if !randNum! lss 10 (
            set "randomChar=!randNum!"
        ) else (
            set /a "randNum-=10"
            set "randomChar=!randNum!"
            set "randomChar=!randomChar!+A"
        )
        set "randomString=!randomString!!randomChar!"
    )

    :: Echo the random string for this iteration
    echo Overwriting content %%A: !randomString!

    :: Copy the file with random string and counter
    copy "dumpper.mkv" "!randomString!_%%A.mp4"
)

endlocal
