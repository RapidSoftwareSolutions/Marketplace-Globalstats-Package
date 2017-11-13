[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Globalstats/functions?utm_source=RapidAPIGitHub_GlobalstatsFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Globalstats Package
Enrich your games' experience by adding a global highscore for your games. We offer an independent, platform agnostic infrastructure for your games statistics.
* Domain: [globalstats.io](https:\/\/globalstats.io)
* Credentials: clientId, clientSecret

## How to get credentials: 
0. Register on the [globalstats.io](https:\/\/globalstats.io)
1. [Create](https:\/\/app.cronofy.com\/oauth\/applications\/new) an game-application for a new API credentials
2. After creation app,in tab `My Games` click `Details` [here](https:\/\/globalstats.io\/users)
 
## Globalstats.getAccessToken
To retrieve a Access Token simply send a request to API.This request has a dedicated rate limit. A maximum of 6 requests per minute are allowed.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Your client id.
| clientSecret| credentials| Your client secret.

## Globalstats.createStatistics
Create new statistics for the first time.With Access Token you can now start creating highscores. Make sure that you have your GTD's are set up. If not, head over to your game settings and create the GTD's you want to track. 

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| name       | String| The name value within the Body of the Request specifies with what name your user will be displayed in the Highscores.
| values     | JSON  | The values themself are the GTD's that you defined in your game configuration. Those consist of a key-value pair.

## Globalstats.updateStatistics
 Once you created a Statistic with the previous request, you can now freely push and updated values for this Statistic. As we want to have this process as easy and efficient as possible we do allow relative updates and also allow creating new values within the update request.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| statisticId| String| Id of the statistic.
| name       | String| The name value within the Body of the Request specifies with what name your user will be displayed in the Highscores.
| values     | JSON  | The values themself are the GTD's that you defined in your game configuration. Those consist of a key-value pair.

First, lets go over the important values of this request.
Within the URL you specify to which Statistic this update should be applied. This is the _id value that was returned from the create request. So the URL that you are calling looks like this in the above example: https://api.globalstats.io/v1/statistics/569c13eb5c25653b008b456d
Again, the Authorization header is added to authenticate with the API.
Then the values is added, same as for the create request, but now with the difference that you can supply relative values! You can either supply a normal number which will overwrite the one stored in our system if it would improve the users ranking for this value, or you supply one of the following relative updates:

- ++ : This increments the stored value by 1
- -- : This decrements the stored value by 1
- +VAL : This increments the stored value by the given VAL
- -VAL : This decrements the stored value by the given VAL
- !VAL : Sets the stored value to the given VAL
- VAL : Sets the stored value to the given VAL if it improves the rank

The incremental updates can be very efficient and usefull if you want to track things like total play time, number of tries for a leve, shots fired, etc.

## Globalstats.getStatistic
Get statistic by id.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| statisticId| String| Id of the statistic.


It returns the name of the user and an array of statistics which consist of following values:
- key : Is the name of the specific statistic value, as it is configured for your application
- value : Is the current value that is stored for this key
- rank : Is the position of the player in our global highscore
The array will contain the details for all configured statistic values for which a value has already been pushed to our system.

## Globalstats.getStatisticSection
A more advanced way of displaying the ranking of the current user in your game is by using a statistic section. The section contains the current ranking of the user and also the rank of the 5 players that are better and worse then the player.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| statisticId| String| Id of the statistic.

## Globalstats.getLeaderboard
You can also fetch the current top positions of your leaderboard with a GTD of your choice.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| limit      | Number| Result limit.
| additionals| JSON  | Optionally you can supply an array with additionals which can be used to add other GTD values to the response.

## Globalstats.getAllAchievements
After you have created some achievements for your game, you can easily get all of them directly via the API. This request is usefull if you want to display a Overview of all Achievements.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.


## Globalstats.getUsersAchievements
This call will return the achivements in the same way as Get all Achievements but will include a flag if the achievement is already accomplished by the user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| statisticId| String| Id of the statistic.

## Globalstats.createRegisterLink
Linking is one of the core components that make this platform unique. It allows your users to link the statistics you create to their own account. By that they are visilbe on the Leaderboards with their account, able to track their progress within their profile and share it with their friends. We highly recommend that you prompt your users to link their statistics with their account. Best checkout one of our Sample Games to see how you can achieve this in your game.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token from `getAccessToken` method.
| statisticId| String| Id of the statistic.
| email      | String| User email.

