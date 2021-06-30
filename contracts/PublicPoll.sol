// SPDX-License-Identifier: MIT
pragma solidity >=0.4.22 <0.8.0;

contract PublicPoll {
    struct Poll {
        uint256 id;
        address creator;
        bool ison;
        string question;
        uint64[] votes;
        bytes32[] options;
    }

    struct Voter {
        address id;
        uint256[] votedIds;
        mapping(uint256 => bool) votedMap;
    }

    Poll[] private polls;
    mapping(address => Voter) private voters;

    event PollCreated(uint256 _pollId);

    function createPoll(string memory _question, bytes32[] memory _options)
        public
        returns (uint256)
    {
        require(bytes(_question).length > 0, "Empty question");
        require(_options.length > 1, "At least 2 options required");

        uint256 pollId = polls.length;

        Poll memory newPoll =
            Poll({
                id: pollId,
                creator: msg.sender,
                question: _question,
                ison: true,
                options: _options,
                votes: new uint64[](_options.length)
            });

        polls.push(newPoll);

        emit PollCreated(pollId);

        return pollId;
    }

    function getPoll(uint256 _pollId)
        external
        view
        returns (
            uint256,
            string memory,
            uint64[] memory,
            bytes32[] memory,
            bool,
            address
        )
    {
        require(_pollId < polls.length && _pollId >= 0, "No poll found");
        return (
            polls[_pollId].id,
            polls[_pollId].question,
            polls[_pollId].votes,
            polls[_pollId].options,
            polls[_pollId].ison,
            polls[_pollId].creator
        );
    }

    function startstopVoting(uint256 _pollId) external {
        require(
            polls[_pollId].creator == msg.sender,
            "You are not a creator of this poll"
        );
        if (polls[_pollId].ison == false) {
            polls[_pollId].ison = true;
        } else {
            polls[_pollId].ison = false;
        }
    }

    function vote(uint256 _pollId, uint64 _vote) external {
        require(_pollId < polls.length, "Poll does not exist");
        require(polls[_pollId].ison == true, "voting is closed");
        require(_vote < polls[_pollId].options.length, "Invalid vote");

        require(
            voters[msg.sender].votedMap[_pollId] == false,
            "You already voted"
        );

        polls[_pollId].votes[_vote] += 1;

        voters[msg.sender].votedIds.push(_pollId);
        voters[msg.sender].votedMap[_pollId] = true;
    }

    function getVoter(address _id)
        external
        view
        returns (address, uint256[] memory)
    {
        return (voters[_id].id, voters[_id].votedIds);
    }

    function getTotalPolls() external view returns (uint256) {
        return polls.length;
    }
}
