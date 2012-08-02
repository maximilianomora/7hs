@echo off
:: Generate VC9 projects/solutions

set CURDIR=%CD%

mkdir vc9Win32 2> nul:
pushd vc9Win32

cmake -D OPT_DEST_VISUALSTUDIO:BOOL=ON -G "Visual Studio 9 2008" "%CURDIR%"
popd

mkdir vc9x64 2> nul:
pushd vc9x64

cmake -D OPT_DEST_VISUALSTUDIO:BOOL=ON -G "Visual Studio 9 2008 Win64" "%CURDIR%"
popd
