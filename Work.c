#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <windows.h>
 
#define MAX_ALARMS 100

int main()
{
    char alarm_times[MAX_ALARMS][6]; // HH:MM format
    int alarm_count = 0;//Alarm count

    FILE *file = fopen("Text.txt", "r");
    if (file != NULL)//check the file is opening or not
    {
        while (fgets(alarm_times[alarm_count], sizeof(alarm_times[alarm_count]), file)) 
        {
           
            alarm_times[alarm_count][strcspn(alarm_times[alarm_count], "\r\n")] = 0; // Remove newline character if present
            alarm_count++;
            if (alarm_count >= MAX_ALARMS) break;//you can set the maximum number of 100 alarms
        }
    fclose(file);

    while (1) {
        time_t now = time(NULL);
        struct tm *t = localtime(&now);// Get current local time
       
        char current_time[6];
        snprintf(current_time, sizeof(current_time), "%02d:%02d", t->tm_hour, t->tm_min);// Format current time as HH:MM
        for (int i = 0; i < alarm_count; i++) {
            if (strcmp(alarm_times[i], current_time) == 0)//check if current time matches any alarm time
             {
                PlaySound(TEXT("alarm.wav"), NULL, SND_FILENAME | SND_ASYNC);//play the alarm sound asynchronously
                Sleep(60000); // Wait 60 seconds to finish the alarm sound
                return 0;
            }
        }
        Sleep(1000); //to tell the for loop to check every second
    }
    return 0;
    }
} 