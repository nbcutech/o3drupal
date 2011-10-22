/**
 * votingapi_service
 * Service methods for Voting API
 * 
 * By Joe Turgeon [http://arithmetric.com]
 * Licensed under GPL version 2
 * Version 2008/04/01
 */

votingapi_service is a Drupal module that provides access to Voting API 
methods through Services. This allows external web applications to access 
and modify voting data for Drupal objects.

votingapi_service provides the following methods:

-- setVote: set vote for specified content from a given user
-- unsetVote: remove vote for specified content from a given user
-- getUserVotes: get all votes for specified content from a given user
-- getContentVotes: get all votes for specified content
-- getVotingResults: get results (current average) for specified content

votingapi_service allows only users with permissions of 'access votes' or 
of 'edit votes' to use these methods.

