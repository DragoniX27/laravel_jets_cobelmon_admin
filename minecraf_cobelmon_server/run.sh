#!/usr/bin/env sh
# Forge requires a configured set of both JVM and program arguments.
# Add custom JVM arguments to the user_jvm_args.txt
# Add custom program arguments {such as nogui} to this file in the next line before the "$@" or
#  pass them to this script directly
java @user_jvm_args.txt @libraries/net/neoforged/forge/1.20.1-47.1.104/unix_args.txt "$@"
